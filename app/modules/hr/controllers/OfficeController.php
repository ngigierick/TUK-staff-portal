<?php

class OfficeController extends GxController {

	
	

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'Office'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'Office'),
			));
	}

	public function actionCreate() {
		$model = new Office;


		if (isset($_POST['Office'])) {
			$model->setAttributes($_POST['Office']);

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
		$model = $this->loadModel($id, 'Office');


		if (isset($_POST['Office'])) {
			$model->setAttributes($_POST['Office']);

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
			$this->loadModel($id, 'Office')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Office('search');
		$model->unsetAttributes();

		if (isset($_GET['Office']))
			$model->setAttributes($_GET['Office']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new Office('search');
		$model->unsetAttributes();

		if (isset($_GET['Office']))
			$model->setAttributes($_GET['Office']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
