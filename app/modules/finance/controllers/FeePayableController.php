<?php

class FeePayableController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('update','delete'),
				'roles'=>array(1),
				),
			array('allow', 
				'actions'=>array('view','admin','minicreate', 'create','update'),
				'roles'=>array(2),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'FeePayable'),
		));
	}

	public function actionCreate() {
		$model = new FeePayable;

		$this->performAjaxValidation($model, 'fee-payable-form');

		if (isset($_POST['FeePayable'])) {
			$model->setAttributes($_POST['FeePayable']);

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
		$model = $this->loadModel($id, 'FeePayable');

		$this->performAjaxValidation($model, 'fee-payable-form');

		if (isset($_POST['FeePayable'])) {
			$model->setAttributes($_POST['FeePayable']);

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
			$this->loadModel($id, 'FeePayable')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('FeePayable');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new FeePayable('search');
		$model->unsetAttributes();

		if (isset($_GET['FeePayable']))
			$model->setAttributes($_GET['FeePayable']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}