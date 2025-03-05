<?php

class EmployeeContactController extends GxController {

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
				'model' => $this->loadModel($id, 'EmployeeContact'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'EmployeeContact'),
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
		
		$model = new EmployeeContact;


		if (isset($_POST['EmployeeContact'])) {
			$model->setAttributes($_POST['EmployeeContact']);
			
			$model->home=$model->county;
			if (!isset($_POST['academic'])){
				//academic staff
				$model->faculty_id=0;
				$model->school_id=0;
				$model->department_id=0;
				$model->title_id=0;
				
			}
						
				if ($model->save()) {
					
					$activity = new UserActivity();
					$activity->agent = "staff with ID : ".$staff->id;
					$activity->category = 4;
					$activity->theuser = $staff->id;
					$activity->user_cat =4;
					$activity->details = "staff added contact details ";
					$activity->date_recorded = time();
					$activity->save();
				
					//session to display appropriate tab
					$session=new CHttpSession;
					$session->open();
					$session['page'] = 2;
					
					 if (Yii::app()->request->isAjaxRequest)
	                 {
	                    echo CJSON::encode(array(
	                        'status'=>'success', 
	                        'div'=>" Contact details updated successfully!"
	                        ));
	                    exit;               
	                 }
			
					 else{
					 	 
						Yii::app()->user->setFlash('success', '<b>New contact details added successfully!</b>');
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
	
		$model = $this->loadModel($id, 'EmployeeContact');

		$staff = $this->loadModel($model->pfNumber->id, 'Employee');
		
		if (isset($_POST['EmployeeContact'])) {
			$model->setAttributes($_POST['EmployeeContact']);
			
			if (!isset($_POST['academic'])){
				//academic staff
				$model->faculty_id=0;
				$model->school_id=0;
				$model->department_id=0;
				$model->title_id=0;
				
			}
			if ($model->save()) {
				
				$session=new CHttpSession;
				$session->open();
				$session['page'] = 2;
				
				$activity = new UserActivity();
				$activity->agent = "staff with ID : ".$staff->id;
				$activity->category = 5;
				$activity->theuser = $staff->id;
				$activity->user_cat =4;
				$activity->details = "staff updated contact details ";
				$activity->date_recorded = time();
				$activity->save();
					
				
				 if (Yii::app()->request->isAjaxRequest)
                 {
                    echo CJSON::encode(array(
                        'status'=>'success', 
                        'div'=>" Contact details updated successfully!"
                        ));
                    exit;               
                 }
		
				 else{
				 	 
					Yii::app()->user->setFlash('success', '<b>Contact details updated successfully!</b>');
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

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'EmployeeContact')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new EmployeeContact('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeContact']))
			$model->setAttributes($_GET['EmployeeContact']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new EmployeeContact('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeContact']))
			$model->setAttributes($_GET['EmployeeContact']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
