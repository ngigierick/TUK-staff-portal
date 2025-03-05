<?php

class AdmissionController extends GxController {

	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin','index','view','minicreate', 'create','update'),
				'roles'=>array(3),
				),
			array('allow', 
				'actions'=>array('delete'),
				'roles'=>array(1),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'Admission'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'Admission'),
			));
	}

	public function actionCreate() {
		$model = new Admission;


		if (isset($_POST['Admission'])) {
			$model->setAttributes($_POST['Admission']);

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
		$model = $this->loadModel($id, 'Admission');


		if (isset($_POST['Admission'])) {
			$model->setAttributes($_POST['Admission']);

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
			$this->loadModel($id, 'Admission')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Admission('search');
		$model->unsetAttributes();

		if (isset($_GET['Admission']))
			$model->setAttributes($_GET['Admission']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new Admission('search');
		$model->unsetAttributes();

		if (isset($_GET['Admission']))
			$model->setAttributes($_GET['Admission']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
