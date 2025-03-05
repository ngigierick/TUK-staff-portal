<?php

class ProjectModuleController extends GxController {

	
	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('create','update','index','view','admin','delete'),
				'roles'=>array(1),
				),
			array('allow', 
				'actions'=>array('view'),
				'roles'=>array(22),
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
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'ProjectModule'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'ProjectModule'),
			));
	}

	public function actionCreate() {
		$model = new ProjectModule;


		if (isset($_POST['ProjectModule'])) {
			$model->setAttributes($_POST['ProjectModule']);
			$model->author_id = Yii::app()->user->id;

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
		$model = $this->loadModel($id, 'ProjectModule');


		if (isset($_POST['ProjectModule'])) {
			$model->setAttributes($_POST['ProjectModule']);
			$model->author_id = Yii::app()->user->id;
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
			$this->loadModel($id, 'ProjectModule')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new ProjectModule('search');
		$model->unsetAttributes();

		if (isset($_GET['ProjectModule']))
			$model->setAttributes($_GET['ProjectModule']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new ProjectModule('search');
		$model->unsetAttributes();

		if (isset($_GET['ProjectModule']))
			$model->setAttributes($_GET['ProjectModule']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
