<?php

class ExamTypeController extends GxController {

	
	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin', 'create','update','view'),
				'roles'=>array(12,15),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
	
}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'ExamType'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'ExamType'),
			));
	}

	public function actionCreate() {
		$model = new ExamType;


		if (isset($_POST['ExamType'])) {
			$model->setAttributes($_POST['ExamType']);

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
		$model = $this->loadModel($id, 'ExamType');


		if (isset($_POST['ExamType'])) {
			$model->setAttributes($_POST['ExamType']);

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
			$this->loadModel($id, 'ExamType')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new ExamType('search');
		$model->unsetAttributes();

		if (isset($_GET['ExamType']))
			$model->setAttributes($_GET['ExamType']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new ExamType('search');
		$model->unsetAttributes();

		if (isset($_GET['ExamType']))
			$model->setAttributes($_GET['ExamType']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
