<?php

class PreviousStudentCreditController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'PreviousStudentCredit'),
		));
	}

	public function actionCreate() {
		$model = new PreviousStudentCredit;

		$this->performAjaxValidation($model, 'previous-student-credit-form');

		if (isset($_POST['PreviousStudentCredit'])) {
			$model->setAttributes($_POST['PreviousStudentCredit']);

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
		$model = $this->loadModel($id, 'PreviousStudentCredit');

		$this->performAjaxValidation($model, 'previous-student-credit-form');

		if (isset($_POST['PreviousStudentCredit'])) {
			$model->setAttributes($_POST['PreviousStudentCredit']);

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
			$this->loadModel($id, 'PreviousStudentCredit')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('PreviousStudentCredit');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new PreviousStudentCredit('search');
		$model->unsetAttributes();

		if (isset($_GET['PreviousStudentCredit']))
			$model->setAttributes($_GET['PreviousStudentCredit']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}