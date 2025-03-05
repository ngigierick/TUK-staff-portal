<?php

class RoleController extends GxController {

	//public $layout='//layouts/operations';
	
	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	$user_id = isset($_GET['id'])?$_GET['id']:'';
	return array(
		array('allow', 
			'actions'=>array('admin','minicreate', 'create','update','view'),
			'roles'=>array(1),
		),
		array('allow', 
				'actions'=>array('view'),
				'users'=>array('@'),
				 'expression' => '(Yii::app()->user->getState("role")) ==='.$user_id,
		),
		array('deny', 
				'users'=>array('*'),
				),
		);
}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'Role'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'Role'),
			));
	}

	public function actionCreate() {
		$model = new Role;

		$this->performAjaxValidation($model, 'role-form');

		if (isset($_POST['Role'])) {
			$model->setAttributes($_POST['Role']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('create', array( 'model' => $model));
		else
			$this->renderPartial('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Role');

		$this->performAjaxValidation($model, 'role-form');

		if (isset($_POST['Role'])) {
			$model->setAttributes($_POST['Role']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
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
			$this->loadModel($id, 'Role')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Role('search');
		$model->unsetAttributes();

		if (isset($_GET['Role']))
			$model->setAttributes($_GET['Role']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new Role('search');
		$model->unsetAttributes();

		if (isset($_GET['Role']))
			$model->setAttributes($_GET['Role']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
