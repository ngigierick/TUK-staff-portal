<?php

class ContractPeriodController extends GxController {

	
	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin', 'create','update','view'),
				'roles'=>array(19),
				),
		
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'ContractPeriod'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'ContractPeriod'),
			));
	}

	public function actionCreate() {
		$model = new ContractPeriod;


		if (isset($_POST['ContractPeriod'])) {
			$model->setAttributes($_POST['ContractPeriod']);

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
		$model = $this->loadModel($id, 'ContractPeriod');


		if (isset($_POST['ContractPeriod'])) {
			$model->setAttributes($_POST['ContractPeriod']);

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
			$this->loadModel($id, 'ContractPeriod')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new ContractPeriod('search');
		$model->unsetAttributes();

		if (isset($_GET['ContractPeriod']))
			$model->setAttributes($_GET['ContractPeriod']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new ContractPeriod('search');
		$model->unsetAttributes();

		if (isset($_GET['ContractPeriod']))
			$model->setAttributes($_GET['ContractPeriod']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
