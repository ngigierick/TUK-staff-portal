<?php
Yii::import('application.modules.intake.models.*');
Yii::import('application.modules.setup.models.Programme');
class CourseController extends GxController {

	public $layout='//layouts/application';
	public $pageTitle = "Online Application for September 2014 Intake";
	
	public function filters() {
	return array(
			'accessControl', 
			);
	}

	public function accessRules() {
		return array(
				
				array('allow', 
					'actions'=>array(
					
						'add',
						'delete',
						'manage',
						
						
						),
					'roles'=>array(999),
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}

	/**
	* Add personal details
	*/
	public function actionAdd()
	{
		$i =$this->applicantID();
		
		//query for personal details
		$model = Applicant::model()->findByPk($i);
						
		
		if (isset($_POST['Applicant'])){
			
			
			
			$model->setAttributes($_POST['Applicant']);
			
			//set course applied for
			$model->programme_id;
			
			//check if not already applied for
			$app = AppCourse::model()->find('programme_id=:prog AND app_id=:ap',array(':prog'=>$model->programme_id,':ap'=>$i));
			
			//check that the course exists
			if(!empty($app->id)){
			
				Yii::app()->user->setFlash('error', "<b>Sorry, you have already applied for the course. Kindly choose another course. </b> ");
				$this->redirect(Yii::app()->createUrl('//courseApplication/course/add'));
			}
			
			
			//query for the course
			$programme = Programme::model()->find('code=?',array($model->programme_id));
			
			//check that the course exists
			if(empty($programme->id)){
			
				Yii::app()->user->setFlash('error', "<b>Sorry, the course chosen is invalid, please try again. Try typing course like electrical, mechanical, computer, sales, marketing, commerce, community development, etc. </b> ");
				$this->redirect(Yii::app()->createUrl('//courseApplication/course/add'));
			}
			
			
			$applicant = Applicant::model()->find('id=?',array($model->id));
			
			$course = new AppCourse;
			$course->app_id = $applicant->id;
			$course->programme_id = $model->programme_id;
			$course->date_modified = time();
			$course->save();
							
			$applicant->status = 2;
			
			//update applicant details
			$applicant->save();
		
			
			if($applicant->save()){
			
				Yii::app()->user->setFlash('success', "<b>You have successfully applied for ".$programme->name."</b> ");
				$this->redirect(Yii::app()->createUrl('//courseApplication/default/profile'));
			}
			
			
			
		}
		$this->render('_form',array('model'=>$model));
	}
	
	/**
	* Add personal details
	*/
	public function actionManage()
	{
		$id = Yii::app()->user->id;
		$app = PreApplicant::model()->findByPk($id);
		
		//query for personal details
		$personalDetails = Applicant::model()->find('LOWER(email)=?',array(strtolower($app->email)));
		
		//query for courses applied 

		$criteria->condition = "app_id = '".$personalDetails->id."'";
		
		$courses=new CActiveDataProvider('AppCourse', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));
		
		$this->render('manage',array('courses'=>$courses));
		
	}
	public function actionDelete( $id )
	{
		$this->loadModel($id, 'AppCourse')->delete();
		$this->redirect(array('manage'));
	
	}
	/**
	* Retrieve applicant ID from Pre-applicant
	*/
	public function applicantID()
	{
	
		$id = Yii::app()->user->id;
		$app = PreApplicant::model()->findByPk($id);
		
		//query for personal details
		$app = Applicant::model()->find('LOWER(email)=?',array(strtolower($app->email)));
		
		//id
		return $app->id;
	}

}
