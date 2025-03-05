<?php

class EmployeeDocController extends GxController {

public $layout='//layouts/column1';

	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin', 'create','update','view'),
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
				'model' => $this->loadModel($id, 'EmployeeDoc'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'EmployeeDoc'),
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
		
		$model = new EmployeeDoc;


		if (isset($_POST['EmployeeDoc'])) {
			$model->setAttributes($_POST['EmployeeDoc']);
								
				if ($model->save()) {
					
					$activity = new UserActivity();
					$activity->agent = "staff with ID : ".$staff->id;
					$activity->category = 4;
					$activity->theuser = $staff->id;
					$activity->user_cat =4;
					$activity->details = "staff added document upload details ";
					$activity->date_recorded = time();
					$activity->save();
				
					//session to display appropriate tab
					$session=new CHttpSession;
					$session->open();
					$session['page'] = 12;

					if ($model->uploadDocument()) $this->redirect(Yii::app()->createUrl('//portal/profile/view'));
				
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
	
		$model = $this->loadModel($id, 'EmployeeDoc');

		$staff = $this->loadModel($model->pfNumber->id, 'Employee');
		
		if (isset($_POST['EmployeeDoc'])) {
			$model->setAttributes($_POST['EmployeeDoc']);

			if ($model->save()) {
				
				$session=new CHttpSession;
				$session->open();
				$session['page'] = 12;
				$activity = new UserActivity();
				$activity->agent = "staff with ID : ".$staff->id;
				$activity->category = 5;
				$activity->theuser = $staff->id;
				$activity->user_cat =4;
				$activity->details = "staff updated document upload details ";
				$activity->date_recorded = time();
				$activity->save();
				if ($model->uploadDocument()) $this->redirect(Yii::app()->createUrl('//portal/profile/view'));
				
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
			$this->loadModel($id, 'EmployeeDoc')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionDelete($id) {
		
		if ($this->loadModel($id, 'EmployeeDoc')->delete()){
			
			$session=new CHttpSession;
			$session->open();
			$session['page'] = 12;
			Yii::app()->user->setFlash('success', '<b>document upload deleted successfully!</b>');
			$this->redirect(Yii::app()->createUrl('//portal/profile/view'));
		}
		
			
	}
	public function actionIndex() {
		$model = new EmployeeDoc('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeDoc']))
			$model->setAttributes($_GET['EmployeeDoc']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new EmployeeDoc('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeDoc']))
			$model->setAttributes($_GET['EmployeeDoc']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
