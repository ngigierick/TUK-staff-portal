<?php

class IctServiceRequestController extends GxController {

	
	
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
				'model' => $this->loadModel($id, 'IctServiceRequest'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'IctServiceRequest'),
			));
	}

	public function actionCreate() {
		$model = new IctServiceRequest;


		if (isset($_POST['IctServiceRequest'])) {
			$model->setAttributes($_POST['IctServiceRequest']);

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
		$model = $this->loadModel($id, 'IctServiceRequest');


		if (isset($_POST['IctServiceRequest'])) {
			$model->setAttributes($_POST['IctServiceRequest']);

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
			$this->loadModel($id, 'IctServiceRequest')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new IctServiceRequest('search');
		$model->unsetAttributes();

		if (isset($_GET['IctServiceRequest']))
			$model->setAttributes($_GET['IctServiceRequest']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new IctServiceRequest('search');
		$model->unsetAttributes();

		if (isset($_GET['IctServiceRequest']))
			$model->setAttributes($_GET['IctServiceRequest']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
