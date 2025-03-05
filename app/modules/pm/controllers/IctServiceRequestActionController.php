<?php

class IctServiceRequestActionController extends GxController {

	
	
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
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'IctServiceRequestAction'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'IctServiceRequestAction'),
			));
	}

	public function actionCreate() {
		$model = new IctServiceRequestAction;


		if (isset($_POST['IctServiceRequestAction'])) {
			$model->setAttributes($_POST['IctServiceRequestAction']);

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
		$model = $this->loadModel($id, 'IctServiceRequestAction');


		if (isset($_POST['IctServiceRequestAction'])) {
			$model->setAttributes($_POST['IctServiceRequestAction']);

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
			$this->loadModel($id, 'IctServiceRequestAction')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new IctServiceRequestAction('search');
		$model->unsetAttributes();

		if (isset($_GET['IctServiceRequestAction']))
			$model->setAttributes($_GET['IctServiceRequestAction']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new IctServiceRequestAction('search');
		$model->unsetAttributes();

		if (isset($_GET['IctServiceRequestAction']))
			$model->setAttributes($_GET['IctServiceRequestAction']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
