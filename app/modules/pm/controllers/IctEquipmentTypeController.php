<?php

class IctEquipmentTypeController extends GxController {

	
	public function filters() {
		return array(
				'accessControl', 
				);
	}
	
	public function accessRules() {
	
		return array(
				array('allow',
					'actions'=>array(
					'view',
					'create',
					'update',
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
				$activity->details = "viewed ICT equipment type of ID ".$id;
				$activity->date_recorded = time();
				$activity->save();
				
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'IctEquipmentType'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'IctEquipmentType'),
			));
	}

	public function actionCreate() {
		$model = new IctEquipmentType;


		if (isset($_POST['IctEquipmentType'])) {
			$model->setAttributes($_POST['IctEquipmentType']);

			if ($model->save()) {
				
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 4;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "Added new ICT equipment type of id:".$model->id;
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
				$activity->details = "error adding new ICT equipment type ";
				$activity->date_recorded = time();
				$activity->save();
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('create', array( 'model' => $model));
		else
			$this->renderPartial('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IctEquipmentType');


		if (isset($_POST['IctEquipmentType'])) {
			$model->setAttributes($_POST['IctEquipmentType']);

			if ($model->save()) {
				
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 5;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "Updated  ICT equipment type of id:".$model->id;
				$activity->date_recorded = time();
				$activity->save();
					
				$this->redirect(array('view', 'id' => $model->id));
			}
			
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 11;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "error updating ICT equipment type ";
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
			$this->loadModel($id, 'IctEquipmentType')->delete();
			
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 6;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "deleted  ICT equipment type of id:".$id;
				$activity->date_recorded = time();
				$activity->save();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new IctEquipmentType('search');
		$model->unsetAttributes();

		if (isset($_GET['IctEquipmentType']))
			$model->setAttributes($_GET['IctEquipmentType']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new IctEquipmentType('search');
		$model->unsetAttributes();

		if (isset($_GET['IctEquipmentType']))
			$model->setAttributes($_GET['IctEquipmentType']);
			
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 8;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "viewed listing of  ICT equipment types";
				$activity->date_recorded = time();
				$activity->save();

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
