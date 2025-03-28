<?php

class DepartmentController extends GxController {

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
				'roles'=>array(1),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Department'),
		));
	}

	public function actionCreate() {
		$model = new Department;

		$this->performAjaxValidation($model, 'department-form');

		if (isset($_POST['Department'])) {
			$model->setAttributes($_POST['Department']);

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
		$model = $this->loadModel($id, 'Department');

		$this->performAjaxValidation($model, 'department-form');

		if (isset($_POST['Department'])) {
			$model->setAttributes($_POST['Department']);

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
			$this->loadModel($id, 'Department')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Department');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Department('search');
		$model->unsetAttributes();

		if (isset($_GET['Department']))
			$model->setAttributes($_GET['Department']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}