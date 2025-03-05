<?php

class IctEquipmentAccessController extends GxController {

	
	
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
				$activity->details = "viewed Equipment Access of ID ".$id;
				$activity->date_recorded = time();
				$activity->save();
				
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'IctEquipmentAccess'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'IctEquipmentAccess'),
			));
	}

	public function actionCreate() {
		$model = new IctEquipmentAccess;


		if (isset($_POST['IctEquipmentAccess'])) {
			$model->setAttributes($_POST['IctEquipmentAccess']);
			
			$model->user_id = Yii::app()->user->id;

			if ($model->save()) {
				
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 4;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "Added new ICT equipment Access record of id:".$model->id;
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
				$activity->details = "error adding new ICT equipment  access record";
				$activity->date_recorded = time();
				$activity->save();
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('create', array( 'model' => $model));
		else
			$this->renderPartial('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IctEquipmentAccess');


		if (isset($_POST['IctEquipmentAccess'])) {
			$model->setAttributes($_POST['IctEquipmentAccess']);

			if ($model->save()) {
				
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 5;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "Updated  ICT equipment Access record of id:".$model->id;
				$activity->date_recorded = time();
				$activity->save();	
				
				$this->redirect(array('view', 'id' => $model->id));
			}
			
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 11;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "error updating ICT equipment access record of id:".$model->id;
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
			$this->loadModel($id, 'IctEquipmentAccess')->delete();
			
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 6;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "deleted  ICT equipment Access record of id:".$id;
				$activity->date_recorded = time();
				$activity->save();
			

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	
	public function actionAdmin() {
		$model = new IctEquipmentAccess('search');
		$model->unsetAttributes();

		if (isset($_GET['IctEquipmentAccess']))
			$model->setAttributes($_GET['IctEquipmentAccess']);
		
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 8;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "viewed listing of  ICT equipment Access Records";
				$activity->date_recorded = time();
				$activity->save();
		$this->render('admin', array(
			'model' => $model,
		));
	}

}
