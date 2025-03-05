<?php

class EmployeeWorkController extends GxController {

	
	public function filters() {
	return array(
				'accessControl', 
				);
	}

	public function accessRules() {
		return array(
				array('allow', 
					'actions'=>array('create','update','delete'),
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
				'model' => $this->loadModel($id, 'EmployeeWork'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'EmployeeWork'),
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
		
		$model = new EmployeeWork;


		if (isset($_POST['EmployeeWork'])) {
			$model->setAttributes($_POST['EmployeeWork']);
			
			//$model->home=$model->country;
		
						
				if ($model->save()) {
					
					$activity = new UserActivity();
					$activity->agent = "staff with ID : ".$staff->id;
					$activity->category = 4;
					$activity->theuser = $staff->id;
					$activity->user_cat =4;
					$activity->details = "staff added employment details ";
					$activity->date_recorded = time();
					$activity->save();
				
					//session to display appropriate tab
					$session=new CHttpSession;
					$session->open();
					$session['page'] = 4;
					
					 if (Yii::app()->request->isAjaxRequest)
	                 {
	                    echo CJSON::encode(array(
	                        'status'=>'success', 
	                        'div'=>" employment details updated successfully!"
	                        ));
	                    exit;               
	                 }
			
					 else{
					 	 
						Yii::app()->user->setFlash('success', '<b>New employment details added successfully!</b>');
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
	
		$model = $this->loadModel($id, 'EmployeeWork');

		$staff = $this->loadModel($model->pfNumber->id, 'Employee');
		
		if (isset($_POST['EmployeeWork'])) {
			$model->setAttributes($_POST['EmployeeWork']);

			if ($model->save()) {
				
				$session=new CHttpSession;
				$session->open();
				$session['page'] = 4;
				
				$activity = new UserActivity();
				$activity->agent = "staff with ID : ".$staff->id;
				$activity->category = 5;
				$activity->theuser = $staff->id;
				$activity->user_cat =4;
				$activity->details = "staff updated employment details ";
				$activity->date_recorded = time();
				$activity->save();
					
				
				 if (Yii::app()->request->isAjaxRequest)
                 {
                    echo CJSON::encode(array(
                        'status'=>'success', 
                        'div'=>" employment details updated successfully!"
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
			$this->loadModel($id, 'EmployeeWork')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionDelete($id) {
		
		if ($this->loadModel($id, 'EmployeeWork')->delete()){
			
			$session=new CHttpSession;
			$session->open();
			$session['page'] = 4;
			Yii::app()->user->setFlash('success', '<b>employment deleted successfully!</b>');
			$this->redirect(Yii::app()->createUrl('//portal/profile/view'));
		}
		
			
	}

	public function actionIndex() {
		$model = new EmployeeWork('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeWork']))
			$model->setAttributes($_GET['EmployeeWork']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new EmployeeWork('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeWork']))
			$model->setAttributes($_GET['EmployeeWork']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
