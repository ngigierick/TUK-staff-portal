<?php

class SemesterController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'roles'=>array(1),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update'),
				'roles'=>array(1),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'roles'=>array(1),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Semester'),
		));
	}

	public function actionCreate() {
		$model = new Semester;

		$this->performAjaxValidation($model, 'semester-form');

		if (isset($_POST['Semester'])) {
			$model->setAttributes($_POST['Semester']);

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
		$model = $this->loadModel($id, 'Semester');

		$this->performAjaxValidation($model, 'semester-form');

		if (isset($_POST['Semester'])) {
			$model->setAttributes($_POST['Semester']);

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
			$this->loadModel($id, 'Semester')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Semester');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Semester('search');
		$model->unsetAttributes();

		if (isset($_GET['Semester']))
			$model->setAttributes($_GET['Semester']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}