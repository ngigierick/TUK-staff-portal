<?php
Yii::import('application.modules.admission.models.*');
class PreviousStudentController extends GxController {

public $total;

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'roles'=>array(1),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update','statement','autocomplete','programmeName'),
				'roles'=>array(1),
				),
			array('allow', 
				'actions'=>array('statement'),
				'roles'=>array(2),
				),
			array('allow', 
				'actions'=>array('admin','delete','admit'),
				'roles'=>array(1),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'PreviousStudent'),
		));
	}

	public function actionCreate() {
		$model = new PreviousStudent;

		$this->performAjaxValidation($model, 'previous-student-form');

		if (isset($_POST['PreviousStudent'])) {
			$model->setAttributes($_POST['PreviousStudent']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'PreviousStudent');

		$this->performAjaxValidation($model, 'previous-student-form');

		if (isset($_POST['PreviousStudent'])) {
			$model->setAttributes($_POST['PreviousStudent']);

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
			$this->loadModel($id, 'PreviousStudent')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('PreviousStudent');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new PreviousStudent('search');
		$model->unsetAttributes();

		if (isset($_GET['PreviousStudent']))
			$model->setAttributes($_GET['PreviousStudent']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionStatement() {
		
		$model = new PreviousStudent;
		
		if (isset($_POST['PreviousStudent'])){
		
			$model->setAttributes($_POST['PreviousStudent']);
			$student=PreviousStudent::model()->find('reg_number=:regnum', array(':regnum'=>$model->reg_number));
			
			if(!isset($student))
			{
				Yii::app()->user->setFlash('error', 'Sorry, no student record found!');
				$this->redirect(array('statement'));
			}
			else{
				$where = "app_number = '".$model->reg_number."' AND val='TRUE' ";
				$debit=new CActiveDataProvider('PreviousStudentDebit', array(
												'criteria'=>array(
													'condition'=>$where,
												),
												'pagination'=>array(
												'pageSize'=>20,
						),
				));
				
				$credit=new CActiveDataProvider('PreviousStudentCredit', array(
												'criteria'=>array(
													'condition'=>$where,
												),
												'pagination'=>array(
												'pageSize'=>20,
						),
				));
				
				$this->render('statement_view', array(
					'model' => $student,
					'debit'=>$debit,
					'credit'=>$credit,
				));
			
			}
			
		}
		else{
		
			$this->render('statement', array(
				'model' => $model,
			));
		}
		
	}
	
	public function actionAutocomplete () {
	  if (isset($_GET['term'])) {
	  
		$criteria=new CDbCriteria;
		$criteria->condition = "reg_number like '%" . $_GET['term'] . "%'";
		$dataProvider=new CActiveDataProvider('PreviousStudent', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>10)));
		
		$students = $dataProvider->getData();
		$return_array = array();
		foreach($students as $student) {
		  $return_array[] = array(
						'label'=>$student->reg_number,
						'value'=>$student->reg_number,
						'id'=>$student->surname.' '.$student->name1.' '.$student->name2,
						);
		}

		echo CJSON::encode($return_array);
	  }
	}
	
	public function actionAdmit() {
	
		$model = new PreviousStudent;
		$newstudent = new Student;
		
		if (isset($_POST['PreviousStudent'])){
		
			
			$model->setAttributes($_POST['PreviousStudent']);
			$programmecode = $model->course_code;
			
			
			//check for missing values
			if ((!isset($model->course_year))||(!isset($model->study_term))||(!isset($_POST['code']))){
			
				Yii::app()->user->setFlash('error', 'Sorry, kindly ensure that you have entered the correct year and term/semester when the course was started!');
			}
			else if (empty($programmecode)){
				Yii::app()->user->setFlash('error', 'Sorry, kindly ensure that you have selected a course!');
			}
			else{
						
				//get students from that course
				$where = "course_code = '".$programmecode."'";
				//$students=new CActiveDataProvider('PreviousStudent', array('criteria'=> array( 'condition'=>$where),'pagination'=>array('pageSize'=>1000,)),);
				$students=new CActiveDataProvider('PreviousStudent', array(
									'criteria'=>array('condition'=>$where),
									'pagination'=>array(
									'pageSize'=>1000,
					),
				));
				
				$criteria = new CDbCriteria;
				$criteria->select='MAX(id) as id';
				$st=Student::model()->find($criteria);
				$num = $st->id;
				
				//
				$data = $students->data;
								
				//process them
				for ($i=0;$i<$students->itemCount;$i++)
				{ 
					//set values to new student
					// and save
					$data[$i]['course_year']=$model->course_year;
					$data[$i]['study_term']=$model->study_term;
					$data[$i]['course_code']=$_POST['code'];
					$data[$i]['id']=$num+$i+2;
					$new = $data[$i];
					$ex = Student::model()->find('reg_number=:reg', array(':reg'=>$new['reg_number']));
					if(!isset($ex->id)){
						$this->saveValues($new);
						$ps = PreviousStudent::model()->find('course_code=:code', array(':code'=>$programmecode));
						$ps->status='3';
						$ps->save();
					}
				
				}
				
			
			}	
			
		}
		
		
			$this->render('admit', array(
				'model' => $model,
			));
		
	
	
	}
	public function saveValues($data) {
	
	
		$newstudent = new Student;
		$model = new PreviousStudent;
		$newstudent->id = $data['id'];
		$newstudent->reg_number = $data['reg_number'];
		$newstudent->college_number = $data['reg_number'];
		$newstudent->academicyear_id = $data['course_year'];
		$newstudent->semester_id = $data['study_term'];
		//title
		if ($data['title'] == 'Mr') $newstudent->title_id=1;
		else if ($data['title'] == 'Miss') $newstudent->title_id=2;
		else if ($data['title'] == 'Mrs') $newstudent->title_id=3;
		else if ($data['title'] == 'Ms') $newstudent->title_id=4;
		else if ($data['sex'] == 'M') $newstudent->title_id=1;
		else if ($data['sex'] == 'F') $newstudent->title_id=2;
		
		$newstudent->id_number = $data['id_number'];
		$newstudent->surname = $data['surname'];
		$newstudent->firstname = $data['name1'];
		$newstudent->othername = $data['name2'];
		$newstudent->programme_id = $data['course_code'];
		$newstudent->dob = (!empty($data['dob'])?$data['dob']:'22222222');

		
		
		//gender
		 $newstudent->gender_id = (($data['sex'] == 'M')?1:2);
		 
		 $newstudent->marital_status_id = 1;
		 $newstudent->nationality_id = 1;
		 $newstudent->county_id = 1;
		 $newstudent->district_id = 1;
		 $newstudent->ethnicity_id = 1;
		 $newstudent->religion_id = 1;
		 $newstudent->postal_address = $data['address1'].' '.$data['address2'].' '.$data['box'];
		 $newstudent->postcode = 11111;
		 $newstudent->town = $data['town'];
		 $newstudent->mobile = (empty($data['phone'])?0722222222:$data['phone']);
		 $newstudent->email = 'test@tukenya.ac.ke';
		 $newstudent->is_employed = $data['employed'];
		 
		 //next of kin
		  $newstudent->nok_surname = $data['nok_name'];
		  $newstudent->nok_postal_address = $data['nok_box'];
		  $newstudent->nok_town = $data['nok_town'];
		  $newstudent->nok_mobile = $data['nok_phone'];
		  $newstudent->disability_id =2;
		  
		  
		  $newstudent->location = $data['location'];
		  $newstudent->sub_location = $data['sub_location'];
		  //employment
		   $newstudent->employer = $data['employer'];
		   $newstudent->occupation = $data['employment_department'];
		   $newstudent->employer_address = $data['employer_box'].' '.$data['employer_town'];
		   $newstudent->employer_telephone = $data['employer_phone'];
		   
		   /////
		   $newstudent->status = 1;
		   $newstudent->date_modified = $data['date_modified'];
		   $newstudent->module_id = $data['module_id'];
		   
		   if(!$newstudent->save()){
		
				$err = "<b>Applicant Validation errors!</b><br/>";
				$err .= CHtml::errorSummary($newstudent);
				
				Yii::app()->user->setFlash('error', $err);
				$this->render('admit', array(
				'model' => $model,
				));
				
				exit;
				
		   }
		 
	
	
	}
	public function actionProgrammeName() {
	
		if (isset($_GET['term'])) {
	  
		$criteria=new CDbCriteria;
		$criteria->condition = "code like '%" . $_GET['term'] . "%'";
		$dataProvider=new CActiveDataProvider('CourseClass', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>10)));
		
		$students = $dataProvider->getData();
		$return_array = array();
		foreach($students as $student) {
		  $return_array[] = array(
						'label'=>$student->code,
						'value'=>$student->code,
						'id'=>$student->name,
						);
		}

		echo CJSON::encode($return_array);
	  }
	}
	
	

}