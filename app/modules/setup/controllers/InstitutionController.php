<?php

class InstitutionController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('staticView'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','create','view','update','delete'),
				'roles'=>array(1),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}
	public function actionStaticView($id) {
		$this->render('static_view', array(
			'model' => $this->loadModel($id, 'Institution'),
		));
	}
	
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Institution'),
		));
	}

	public function actionCreate() {
		$model = new Institution;

		$this->performAjaxValidation($model, 'institution-form');

		if (isset($_POST['Institution'])) {
			$model->setAttributes($_POST['Institution']);

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
		$model = $this->loadModel($id, 'Institution');

		$this->performAjaxValidation($model, 'institution-form');

		if (isset($_POST['Institution'])) {
			$model->setAttributes($_POST['Institution']);

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
			$this->loadModel($id, 'Institution')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Institution');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Institution('search');
		$model->unsetAttributes();

		if (isset($_GET['Institution']))
			$model->setAttributes($_GET['Institution']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}