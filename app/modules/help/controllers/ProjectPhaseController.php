<?php

class ProjectPhaseController extends GxController {

	
	
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
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'ProjectPhase'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'ProjectPhase'),
			));
	}

	public function actionCreate() {
		$model = new ProjectPhase;


		if (isset($_POST['ProjectPhase'])) {
			$model->setAttributes($_POST['ProjectPhase']);
			$model->date_added = time();
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
		$model = $this->loadModel($id, 'ProjectPhase');


		if (isset($_POST['ProjectPhase'])) {
			$model->setAttributes($_POST['ProjectPhase']);
			//$model->date_added = time();
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
			$this->loadModel($id, 'ProjectPhase')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new ProjectPhase('search');
		$model->unsetAttributes();

		if (isset($_GET['ProjectPhase']))
			$model->setAttributes($_GET['ProjectPhase']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new ProjectPhase('search');
		$model->unsetAttributes();

		if (isset($_GET['ProjectPhase']))
			$model->setAttributes($_GET['ProjectPhase']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
