<?php

class EmployeeQualificationController extends GxController {
	public $layout='//layouts/portal';
	public $pageTitle = ":: Staff ePortal";
	
	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin', 'create','update','view'),
				'roles'=>array(19),
				),
			array('allow', 
				'actions'=>array( 'create','update','view','delete'),
				'roles'=>array(9999),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'EmployeeQualification'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'EmployeeQualification'),
			));
	}

	public function actionCreate() {
			
		$id = Yii::app()->user->id;
		
		$staff = $this->loadModel($id, 'Employee');
		
		//check if staff already existing
		if(empty($staff->id)){
			
			$activity = new UserActivity();
			$activity->agent = "staff with ID : ".$id;
			$activity->category = 1;
			$activity->theuser = $id;
			$activity->user_cat =4;
			$activity->details = "No stafff found associated with the number ";
			$activity->date_recorded = time();
			$activity->save();
					
			Yii::app()->user->setFlash('error', '<b>No stafff found associated with the number.</b>');
			$this->redirect(Yii::app()->createUrl('//portal/profile/view'));
		}
		
		$model = new EmployeeQualification;


		if (isset($_POST['EmployeeQualification'])) {
			$model->setAttributes($_POST['EmployeeQualification']);
			
			//$model->home=$model->country;
		
						
				if ($model->save()) {
					
					$activity = new UserActivity();
					$activity->agent = "staff with ID : ".$staff->id;
					$activity->category = 4;
					$activity->theuser = $staff->id;
					$activity->user_cat =4;
					$activity->details = "staff added Qualification details ";
					$activity->date_recorded = time();
					$activity->save();
				
					$this->updateHighestQualifications($staff->pf_number);
					
					//session to display appropriate tab
					$session=new CHttpSession;
					$session->open();
					$session['page'] = 3;
					
					 if (Yii::app()->request->isAjaxRequest)
	                 {
	                    echo CJSON::encode(array(
	                        'status'=>'success', 
	                        'div'=>" Qualification details updated successfully!"
	                        ));
	                    exit;               
	                 }
			
					 else{
					 	 
						Yii::app()->user->setFlash('success', '<b>New Qualification details added successfully!</b>');
						$this->redirect(Yii::app()->createUrl('//portal/profile/view'));
					 }
				
			}
				
			}
		
		if (Yii::app()->request->isAjaxRequest)
        {
            echo CJSON::encode(array(
                'status'=>'failure', 
                'div'=>$this->renderPartial('create', array('model'=>$model,'staff'=>$staff), true)));
            exit;               
        }
		$this->render('create', array( 'model' => $model,'staff'=>$staff));
		
	}

	public function actionUpdate($id) {
	
		$model = $this->loadModel($id, 'EmployeeQualification');

		$staff = $this->loadModel($model->pfNumber->id, 'Employee');
		
		if (isset($_POST['EmployeeQualification'])) {
			$model->setAttributes($_POST['EmployeeQualification']);

			if ($model->save()) {
				
				$session=new CHttpSession;
				$session->open();
				$session['page'] = 3;
				
				$activity = new UserActivity();
				$activity->agent = "staff with ID : ".$staff->id;
				$activity->category = 5;
				$activity->theuser = $staff->id;
				$activity->user_cat =4;
				$activity->details = "staff updated Qualification details ";
				$activity->date_recorded = time();
				$activity->save();
				
				$this->updateHighestQualifications($staff->pf_number);
					
				
				 if (Yii::app()->request->isAjaxRequest)
                 {
                    echo CJSON::encode(array(
                        'status'=>'success', 
                        'div'=>" Qualification details updated successfully!"
                        ));
                    exit;               
                 }
		
				 else{
				 	 
					Yii::app()->user->setFlash('success', '<b>Qualification details updated successfully!</b>');
					$this->redirect(Yii::app()->createUrl('//portal/profile/view'));
				 }
				
			}
		}
		if (Yii::app()->request->isAjaxRequest)
        {
            echo CJSON::encode(array(
                'status'=>'failure', 
                'div'=>$this->renderPartial('update', array('model'=>$model,'staff'=>$staff), true)));
            exit;               
        }
		$this->render('update', array( 'model' => $model,'staff'=>$staff));
	}

	
	public function actionDelete1($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'EmployeeQualification')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionDelete($id) {
		
		$model = $this->loadModel($id, 'EmployeeQualification');

		$staff = $this->loadModel($model->pfNumber->id, 'Employee');
		
		if ($this->loadModel($id, 'EmployeeQualification')->delete()){
			$this->updateHighestQualifications($staff->pf_number);
			$session=new CHttpSession;
			$session->open();
			$session['page'] = 3;
			Yii::app()->user->setFlash('success', '<b>Qualification deleted successfully!</b>');
			$this->redirect(Yii::app()->createUrl('//portal/profile/view'));
		}
		
			
	}
	
	public function actionIndex() {
		$model = new EmployeeQualification('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeQualification']))
			$model->setAttributes($_GET['EmployeeQualification']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new EmployeeQualification('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeQualification']))
			$model->setAttributes($_GET['EmployeeQualification']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function updateHighestQualifications($pf_number){
		
		//update highest qulaifications
		$staff = Employee::model()->find('lower(pf_number)=?',array(strtolower($pf_number)));
		$criteria = new CDbCriteria;
		$criteria->with = array('level');
		$criteria->condition  = "t.pf_number='".$pf_number."' AND year != 'On-going' ";
		$criteria->order='level.weight ASC';
		$qual 	= EmployeeQualification::model()->findAll($criteria);
		$staff->highest_qualification_id = (isset( $qual[0]->id))?$qual[0]->level_id:0;
		$staff->save();
	}

}
