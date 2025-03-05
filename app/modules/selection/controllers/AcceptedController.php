<?php
Yii::import('application.modules.intake.models.*');
Yii::import('application.modules.setup.models.*');
Yii::import('application.modules.admission.models.*');
class AcceptedController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin','delete','update','view','selection','approve','allapplicants','qualified','list','listing','changeCourse','excel'),
				'roles'=>array(3),
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
			'model' => $this->loadModel($id, 'Accepted'),
		));
	}

	public function actionCreate() {
		$model = new Accepted;

		$this->performAjaxValidation($model, 'accepted-form');

		if (isset($_POST['Accepted'])) {
			$model->setAttributes($_POST['Accepted']);

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
		$model = $this->loadModel($id, 'Accepted');

		$this->performAjaxValidation($model, 'accepted-form');

		if (isset($_POST['Accepted'])) {
			$model->setAttributes($_POST['Accepted']);

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
			$this->loadModel($id, 'Accepted')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Accepted');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		
		$this->render('admin');
		
	}
	public function actionListing() {
		
		$model = new Accepted('search');
		$model->unsetAttributes();

		if (isset($_GET['Accepted']))
			$model->setAttributes($_GET['Accepted']);

		$this->renderPartial('list', array('model' => $model,));
		
	}
	public function actionList() {
		$model = new Accepted('search');
		$model->unsetAttributes();

		if (isset($_GET['Accepted']))
			$model->setAttributes($_GET['Accepted']);

		$this->render('list', array('model' => $model,));
	}
	public function actionSelection()
	{
		$model = new Accepted;

		if (isset($_POST['id'])){
		
			$this->actionApprove($_POST['id']);
		
		}
		else if (isset($_POST['Accepted'])){
			$model->setAttributes($_POST['Accepted']);
			$criteria=new CDbCriteria;
			$criteria->condition='programme_id=:id AND academicyear_id=:ac AND status=0';
			$criteria->params=array(':id'=>$model->programme_id,':ac'=>$model->academicyear_id);
			$dataProvider=new CActiveDataProvider('Applicant', array(
											'criteria'=>$criteria,
											'pagination'=>array(
											'pageSize'=>300,
					),
			));
			if($dataProvider->getItemCount()<1)
			{
				Yii::app()->user->setFlash('error', 'Sorry, no applicant found associated with that course/ programme!');
				$this->redirect(array('selection'));
			}
			else{
			
				$data = $dataProvider->getData();
				$title = "All Applicants | ".$data[0]->programme." of ".$data[0]->academicyear." Academic Year";
				$this->render('selectionpanel', array(
					'dataProvider' => $dataProvider,
					'title'=>$title,
					'model'=>$model
				));
			}
			
		}
		else{
		
			$this->render('selection', array(
			'model' => $model,
		));
		
		}
		
	}
	
	public function actionAllapplicants()
	{
		
		if (isset($_POST['id'])){
		
			$this->actionApprove($_POST['id']);
		
		}
		else{
		
			$model = new Accepted;
			$criteria=new CDbCriteria;
			$criteria->condition='status=0';
			$dataProvider=new CActiveDataProvider('Applicant', 
												array('criteria'=>$criteria,
												'pagination'=>array(
												'pageSize'=>1000,
						),
			));
		
			$title = "All Applicants ";
			$this->render('selectionpanel_all', array(
						'dataProvider' => $dataProvider,
						'title'=>$title,
						'model'=>$model
					));
				
		}
	
	}

	public function actionApprove($ids)
	{
		
		if(count($ids)>0)
		{
			
			/*$app = new Applicant;
			$transaction=$app->dbConnection->beginTransaction();
			try
			{*/
				$success = false;
				$err = 'Possible causes<br/>';
				foreach($ids as $id)
				{
					//$applicant = $this->loadModel($id, 'Applicant');
					$model = new Accepted;
					$applicant = new Applicant;
					$applicant=Applicant::model()->findByPk($id);
					$model->setAttributes($applicant->getAttributes(),false);
					$newnum = $this->newRegistrationNumber();
					//echo $model->surname.'<br/>';
					$model->id = $newnum;
					$yr = date('Y');
					$module=($model->module_id===1)?'':'P';
					$num = $model->programme_id.'/'.$newnum.$module.'/'.$yr;
					$model->reg_number = $model->college_number = $num;
						
					if (!$model->validate()) {
						//die(CVarDumper::dump($model->errors,10,true));
						$err .= CHtml::errorSummary($model);
						break;
					}
					if ($model->save()){
						$applicant->status = 1;
						if ($applicant->save())
						$success = true;
						//error updating
						else{
								$err .= "<b>Applicant Validation errors!</b><br/>";
								$err .= CHtml::errorSummary($applicant);
								$success = false; 
								break;
						}
					}
					else{
						
						$success = false; 
						$rr='';
						$err .= "<b>Approval Validation errors!</b><br/>";
						$err .= CHtml::errorSummary($model);
						break;
					
					}
				}
				//operation successful
				if ($success){
				
					Yii::app()->user->setFlash('success', '<b>Operation successful!</b><br/> The following applicants have been confirmed for the intake of '.$applicant->programme.' '.$applicant->academicyear.' academic year');
					$criteria=new CDbCriteria;
					$criteria->condition='programme_id=:id AND academicyear_id=:ac';
					$criteria->params=array(':id'=>$applicant->programme_id,':ac'=>$applicant->academicyear_id);
					$successfulapplicants=new CActiveDataProvider('Accepted', array(
												'criteria'=>$criteria,
												'pagination'=>array(
												'pageSize'=>100,
						),
					));
					
					$this->render('qualified', array(
					'dataProvider' => $successfulapplicants,
					//'title'=>$title,
					//'model'=>$model
					));
					
				}
				//operation failed
				else{
				
					Yii::app()->user->setFlash('error', "Operation failed! Please try contact the system administrator for assistance.<br/> ".$err);
					$this->redirect(array('selection'));
				
				}
			/*}
			catch(Exception $e)
			{
				Yii::app()->user->setFlash('error', "<b>Error encountered!</b> <br/>".$e->getMessage());
				$transaction->rollback();
				$this->redirect(array('selection'));
			}
			*/
		}
	}
	
	public function actionQualified()
	{
	
		//$criteria=new CDbCriteria;
		//$criteria->condition='programme_id=:id AND academicyear_id=:ac';
		//$criteria->params=array(':id'=>$applicant->programme_id,':ac'=>$applicant->academicyear_id);
		$successfulapplicants=new CActiveDataProvider('Accepted', array(
									//'criteria'=>$criteria,
									'pagination'=>array(
									'pageSize'=>100,
			),
		));
		$model = new Accepted('search');
		$this->render('qualified_list', array(
		'dataProvider' => $successfulapplicants,
		//'title'=>$title,
		'model'=>$model
		));
	
	
	}
	
	public function newRegistrationNumber()
	{
		$criteria = new CDbCriteria;
		$criteria->select='MAX(id) as id';
		$student=Accepted::model()->find($criteria);
		$num = $student->id;
		if ($num<1) $num=1599;
		$num = $num+1; 
		$num = str_pad( $num, 5, "0", STR_PAD_LEFT );
		return $num;
	
	}
	
	function actionChangeCourse()
	{
		$model = new Accepted;
		if (isset($_POST['Accepted']))
		{
			$model->setAttributes($_POST['Accepted']);
			$accepted = Accepted::model()->find('reg_number=:reg', array(':reg'=>$model->reg_number));
			$code = $model->programme_id;
			$prog = Programme::model()->find('code=:c', array(':c'=>$code));
			//no applicant found with that number
			if(!isset($accepted))
			{
				$message ="<b>Change Course Operation Failed!</b><br/>No selected applicant found with that registration number.";
				Yii::app()->user->setFlash('error', $message);
			}
			else if(!isset($prog))
			{
				$message ="<b>Change Course Operation Failed!</b><br/>The new course or programme doesn't exist.";
				Yii::app()->user->setFlash('error', $message);
			}
			else
			{
				$new_reg = substr($accepted->reg_number, 4);
				$new_reg = $code.$new_reg;
				$accepted->reg_number=$new_reg;
				$accepted->programme_id=$model->programme_id;
				if($accepted->save()){
					Yii::app()->user->setFlash('success', 
					'<b>Changing Course successful!</b><br/> '.
					$accepted->surname.' '.
					$accepted->firstname.' '.
					$accepted->othername.' has been transferred to  '.
					$accepted->programme.' '.
					$accepted->academicyear.' academic year');
					
					$criteria=new CDbCriteria;
					$criteria->condition='programme_id=:id AND academicyear_id=:ac';
					$criteria->params=array(':id'=>$accepted->programme_id,':ac'=>$accepted->academicyear_id);
					$successfulapplicants=new CActiveDataProvider('Accepted', array(
												'criteria'=>$criteria,
												'pagination'=>array(
												'pageSize'=>100,
						),
					));
					
					$this->render('qualified', array(
					'dataProvider' => $successfulapplicants,
					//'title'=>$title,
					//'model'=>$model
					));
					
					exit;
					
				}
				else {
					$message ="<b>Change Course Operation Failed!</b><br/>Please contact the administrator for further assistance.";
					Yii::app()->user->setFlash('error', $message);
				}
					
			}		
			
		}
		$this->render('search_applicant', array(
			'model' => $model,
		));
	}
	
	public function actionExcel(){
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("K'iin Balam")
             ->setLastModifiedBy("K'iin Balam")
             ->setTitle("YiiExcel Test Document")
             ->setSubject("YiiExcel Test Document")
             ->setDescription("Test document for YiiExcel, generated using PHP classes.")
             ->setKeywords("office PHPExcel php YiiExcel UPNFM")
             ->setCategory("Test result file");        
        
        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');
        
        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
        
        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('YiiExcel');
        
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        
        // Save a xls file
        $filename = 'YiiExcel';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
        header('Cache-Control: max-age=0');
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $objWriter->save('php://output');
        unset($this->objWriter);
        unset($this->objWorksheet);
        unset($this->objReader);
        unset($this->objPHPExcel);
        exit();
    }//fin del método actionExcel

}