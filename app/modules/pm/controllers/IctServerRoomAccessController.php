<?php

class IctServerRoomAccessController extends GxController {

	
	
public function filters() {
		return array(
				'accessControl', 
				);
	}
	
	public function accessRules() {
	
		return array(
				array('allow',
					'actions'=>array(
					'create',
					'update',
					'view',
					'admin',
					),
					'roles'=>array(1,22),
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
		
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 5;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "viewed server room access of ID ".$id;
				$activity->date_recorded = time();
				$activity->save();
				
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'IctServerRoomAccess'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'IctServerRoomAccess'),
			));
	}

	public function actionCreate() {
		$model = new IctServerRoomAccess;


		if (isset($_POST['IctServerRoomAccess'])) {
			$model->setAttributes($_POST['IctServerRoomAccess']);
			$model->user_id = Yii::app()->user->id;
			if ($model->save()) {
				
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 4;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "created server room access of ID ".$model->id;
				$activity->date_recorded = time();
				$activity->save();
				
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
			
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 11;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "error creating server room access";
				$activity->date_recorded = time();
				$activity->save();
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('create', array( 'model' => $model));
		else
			$this->renderPartial('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IctServerRoomAccess');


		if (isset($_POST['IctServerRoomAccess'])) {
			$model->setAttributes($_POST['IctServerRoomAccess']);

			if ($model->save()) {
					
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 5;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "updated server room access of ID: ".$id;
				$activity->date_recorded = time();
				$activity->save();
				
				$this->redirect(array('view', 'id' => $model->id));
			}
			
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 11;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "error updating server room access of ID: ".$id;
				$activity->date_recorded = time();
				$activity->save();
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('update', array(
				'model' => $model,
				));
		else
			$this->renderPartial('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'IctServerRoomAccess')->delete();

				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 6;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "deleted server room access of ID: ".$id;
				$activity->date_recorded = time();
				$activity->save();
				
				
			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	
	public function actionAdmin() {
		$model = new IctServerRoomAccess('search');
		$model->unsetAttributes();

		if (isset($_GET['IctServerRoomAccess']))
			$model->setAttributes($_GET['IctServerRoomAccess']);
				
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 8;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "viewed a listing of server room access records";
				$activity->date_recorded = time();
				$activity->save();
				
		$this->render('admin', array(
			'model' => $model,
		));
	}

}
