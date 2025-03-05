<?php
Yii::import('application.modules.selection.models.*');
Yii::import('application.modules.finance.models.*');
class StudentController extends GxController {

public $layout='//layouts/column1';
public $total;
public $feeitems;
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin','minicreate', 'create','view','update','admit','continualAdmission','showApplicants','showStudents','showStudent','verify','template'),
				'roles'=>array(3),
				),
			array('allow', 
				'actions'=>array('showStudents','statement'),
				'roles'=>array(2),
				),
			array('allow', 
				'actions'=>array('delete'),
				'roles'=>array(1),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Student'),
		));
	}
	public function actionTemplate() {
		$this->render('template');
	}
	public function actionCreate() {
		$model = new Student;
		$applicant = new Accepted;
		$admission = new Admission;
		
		//try to restore student admission form values with applicant data - incase of error
		if ((isset($_POST['reg_number_bk'])) && (isset($_POST['academic_year_bk']))){
			$reg_number=$_POST['reg_number_bk'];
			$academicyear_id=$_POST['academic_year_bk'];
			$applicant=Accepted::model()->find('reg_number=:regnum AND academicyear_id=:ac', array(':regnum'=>$reg_number, ':ac'=>$academicyear_id));
			$model->setAttributes($applicant->getAttributes(),false);
		}
		else{
		
			$this->redirect(array('admit'));
		}
		if (isset($_POST['Student'])) {
		
			$model->setAttributes($_POST['Student']);

			if ($model->save()) {
				$message ="<h2>Admission Successful!</h2><br/><h5> ".
				$model->title.' '.$model->surname.' '.$model->firstname.' '.$model->othername.
				' has been succesfully admittted for '.$model->programme.' in '.$model->academicyear.' academic year</h5>';
				
				$applicant->status=3;
				$applicant->save(false);
					
				Yii::app()->user->setFlash('success', $message);

				$admission->semester_id = $model->semester_id;
				$admission->reg_number = $model->reg_number;
				$admission->year_of_study = $_POST['year_of_study'];
				$admission->semester_of_study = $_POST['semester_of_study'];
				$admission->save(false);
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Student');

		$this->performAjaxValidation($model, 'student-form');

		if (isset($_POST['Student'])) {
			$model->setAttributes($_POST['Student']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Student')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Student');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Student('search');
		$model->unsetAttributes();

		if (isset($_GET['Student']))
			$model->setAttributes($_GET['Student']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionVerify()
	{
		$model = new Student;
		if (isset($_POST['Student'])) {
		
			$model->setAttributes($_POST['Student']);
			$applicant=Accepted::model()->find('reg_number=:regnum', array(':regnum'=>$model->reg_number));
			
			if(!isset($applicant))
			{
				Yii::app()->user->setFlash('error', 'Sorry, no selected applicant found associated with that registration number!');
				$this->redirect(array('verify'));
			}
			else if($applicant->status === 1){
				Yii::app()->user->setFlash('error', '<b>Admission Failure</b><br/>Sorry, the applicant admission details have been verified');
				$this->redirect(array('verify'));
			}
			else{
			
				
				$message ="<b>Verification Successful!</b><br/> ".
				$applicant->title.' '.$applicant->surname.' '.$applicant->firstname.' '.$applicant->othername.
				' <b>[Registration Number: '.$applicant->reg_number.']</b> admission details have been certified and can now be allowed for admission into  '.$applicant->programme.' in '.$applicant->academicyear.' academic year</h5>';
				
				$applicant->status=1;
				if($applicant->save(false)){
					
					Yii::app()->user->setFlash('success', $message);
					$this->redirect(array('verify'));
				}
				else{
				
					Yii::app()->user->setFlash('error', '<b>Operation aborted!</b><br/>Please contact the administrator for assistance.');
				}
				
				$this->redirect(array('verify'));
			
			}
		}

		$this->render('verify', array( 'model' => $model));
	}
	public function actionAdmit() {
	
		$model = new Student;

		$this->performAjaxValidation($model, 'student-form');

		if (isset($_POST['Student'])) {
		
			$model->setAttributes($_POST['Student']);
			$applicant=Accepted::model()->find('reg_number=:regnum AND academicyear_id=:ac', array(':regnum'=>$model->reg_number, ':ac'=>$model->academicyear_id));
			
			if(!isset($applicant))
			{
				Yii::app()->user->setFlash('error', 'Sorry, no selected applicant found associated with that registration number!');
				$this->redirect(array('admit'));
			}
			else if($applicant->status === 0){
				Yii::app()->user->setFlash('error', '<b>Admission Failure</b><br/>Sorry, kindly ensure that admission requirements have been verified');
				$this->redirect(array('admit'));
			}
			else if($applicant->status === 3){
				Yii::app()->user->setFlash('error', '<b>Admission Failure</b><br/>Sorry, the student is already admitted');
				$this->redirect(array('admit'));
			}
			else{
			
				//admission form
				$student = new Student;
				$student->setAttributes($applicant->getAttributes(),false);
				$this->render('create', array( 'model' => $student));exit;
			
			}
		}

		$this->render('admit', array( 'model' => $model));
	}
	public function actionAdmitBK() {
	
		$model = new Student;

		$this->performAjaxValidation($model, 'student-form');

		if (isset($_POST['Student'])) {
		
			$model->setAttributes($_POST['Student']);
			$applicant=Accepted::model()->find('reg_number=:regnum AND academicyear_id=:ac', array(':regnum'=>$model->reg_number, ':ac'=>$model->academicyear_id));
			
			if(!isset($applicant))
			{
				Yii::app()->user->setFlash('error', 'Sorry, no selected applicant found associated with that registration number!');
				$this->redirect(array('admit'));
			}
			else if($applicant->status === 0){
				Yii::app()->user->setFlash('error', '<b>Admission Failure</b><br/>Sorry, kindly ensure that admission requirements have been verified');
				$this->redirect(array('admit'));
			}
			else if($applicant->status === 3){
				Yii::app()->user->setFlash('error', '<b>Admission Failure</b><br/>Sorry, the student is already admitted');
				$this->redirect(array('admit'));
			}
			else{
			
				//admission form
				$student = new Student;
				$student->setAttributes($applicant->getAttributes(),false);
				$this->render('create', array( 'model' => $student));exit;
			
			}
		}

		$this->render('admit', array( 'model' => $model));
	}
	public function actionContinualAdmission()
	{
	
		$model = new Admission;
		
		if (isset($_POST['Admission'])) {
		
			$model->setAttributes($_POST['Admission']);
			$st=Student::model()->findAll('programme_id=:num', array(':num'=>$model->reg_number));
			$code = $model->reg_number;
			if(!isset($st))
			{
				Yii::app()->user->setFlash('error', 'Sorry, no continuing students found associated with that course!');
				$this->redirect(array('continualAdmission'));
			}
			else{
			
				//loop through to admit student
				
				for($i=0;$i<count($st);$i++){ 

					$adm=Admission::model()->find('reg_number=:regnum AND semester_id=:ac', array(':regnum'=>$st[$i]->reg_number, ':ac'=>$st[$i]->semester_id));
					
					if(!isset($adm)){
					
						$admission = new Admission;
						$admission->setAttributes($_POST['Admission']);
						
						//admit student
						$admission->reg_number = $st[$i]->reg_number;
						if (!$admission->save(false)){
						
							Yii::app()->user->setFlash('error', '<b>Admission Failure</b><br/>Please contact the administrator for further assistance');
							$this->redirect(array('continualAdmission'));
						}
					}
				
				}
				$message ="<h2>Admission Successful!</h2><br/><h5> ";
				Yii::app()->user->setFlash('error', $message);
				$this->redirect(array('continualAdmission'));
				/// end loop
			}
			
		}
		$this->render('continual_admission', array( 'model' => $model));
	
	}
	public function actionContinualAdmissionBK()
	{
	
		$model = new Admission;
		
		if (isset($_POST['Admission'])) {
		
			$model->setAttributes($_POST['Admission']);
			$st=Student::model()->find('reg_number=:regnum', array(':regnum'=>$model->reg_number));
			
			if(!isset($st))
			{
				Yii::app()->user->setFlash('error', 'Sorry, no continuing student found associated with that registration number!');
				$this->redirect(array('continualAdmission'));
			}
			else{
			
				$adm=Admission::model()->find('reg_number=:regnum AND semester_id=:ac', array(':regnum'=>$model->reg_number, ':ac'=>$model->semester_id));
				if(isset($adm)){
				
					Yii::app()->user->setFlash('error', '<b>Admission Failure</b><br/>Sorry, the student is already admitted for that academic year & semester');
					$this->redirect(array('continualAdmission'));
				}
				else{
					
					//admit student
					if ($model->save(false)){
					
						$message ="<h2>Admission Successful!</h2><br/><h5> ".
						$st->title.' '.$st->surname.' '.$st->firstname.' '.$st->othername.
						' has been succesfully admittted for '.$st->programme.' in '.$st->academicyear.' academic year</h5>';
						
						Yii::app()->user->setFlash('success', $message);
						$this->redirect(array('view', 'id' => $st->id));
						
					}
					else{
					
						Yii::app()->user->setFlash('error', '<b>Admission Failure</b><br/>Please contact the administrator for further assistance');
						$this->redirect(array('continualAdmission'));
					}
				}
			}
			
		}
		$this->render('continual_admission', array( 'model' => $model));
	
	}
	public function actionStatement()
	{
	
		$model = new Student;
		if (isset($_POST['Student']))
		{
			$model->setAttributes($_POST['Student']);
			$student = Student::model()->find('reg_number=:reg', array(':reg'=>$model->reg_number));
			if(!empty($student)){
			
				$where = "reg_number = '".$model->reg_number."'";
				$this->feeitems  = new CActiveDataProvider('FeePayable', array('pagination'=>array('pageSize'=>100)));
				$debit=new CActiveDataProvider('StudentInvoice', array(
												'criteria'=>array(
													'condition'=>$where,
												),
												'pagination'=>array(
												'pageSize'=>1000,
						),
				));
				$where = "student_reg = '".$model->reg_number."'";
				$credit=new CActiveDataProvider('StudentReceipt', array(
												'criteria'=>array(
													'condition'=>$where,
												),
												'pagination'=>array(
												'pageSize'=>1000,
						),
				));
				
				$this->render('statement_view', array(
					'model' => $student,
					'debit'=>$debit,
					'credit'=>$credit,
				));
				
				exit;
				
			}
			else{
				Yii::app()->user->setFlash('error', "<b>Fee Statemant Failure</b><br/> No student found associated with that registration number.");
			}
			
		}
		$this->render('search_student_statement', array(
			'model' => $model,
		));
	
	
	}
	public function actionShowApplicants () {
	  if (isset($_GET['term'])) {
	  
		$criteria=new CDbCriteria;
		
		$criteria->condition = "reg_number like '%" . $_GET['term'] . "%'";
		
		$dataProvider=new CActiveDataProvider('Accepted', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));

		$data = $dataProvider->getData();

		$return_array = array();
		foreach($data as $d) {
		  $return_array[] = array(
						'label'=>$d->reg_number,
						'value'=>$d->reg_number,
						'id'=>$d->reg_number,
						//'id'=>$d->surname.' '.$d->name1.' '.$d->name2,
						);
		}

		echo CJSON::encode($return_array);
	  }
	}
	
	function actionShowStudents(){
	
		if (isset($_GET['term'])) {
		  
			$criteria=new CDbCriteria;
			
			$criteria->condition = "reg_number like '%" . $_GET['term'] . "%'";
			
			$dataProvider=new CActiveDataProvider('Student', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));

			$data = $dataProvider->getData();

			$return_array = array();
			foreach($data as $d) {
			  $return_array[] = array(
							'label'=>$d->reg_number,
							'value'=>$d->reg_number,
							'id'=>$d->reg_number,
							//'id'=>$d->surname.' '.$d->name1.' '.$d->name2,
							);
			}

			echo CJSON::encode($return_array);
		  }
	
	
	}
	
	public function actionShowStudent () {
	  if (isset($_GET['term'])) {
	  
		$criteria=new CDbCriteria;
		
		$criteria->condition = "reg_number like '%" . $_GET['term'] . "%'";
		
		$dataProvider=new CActiveDataProvider('Student', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));

		$data = $dataProvider->getData();

		$return_array = array();
		foreach($data as $d) {
		  $return_array[] = array(
						'label'=>$d->reg_number,
						'value'=>$d->reg_number,
						//'id'=>$d->programme_id,
						'id'=>$d->surname.' '.$d->firstname.' '.$d->othername,
						);
		}

		echo CJSON::encode($return_array);
	  }
	}
}