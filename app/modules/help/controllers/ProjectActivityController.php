<?php

class ProjectActivityController extends GxController {

	public $layout='//layouts/column1';
	public $menu2,$menu3,$number,$form,$units,$unitcost,$total,$counter=0;
	
	
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
				'model' => $this->loadModel($id, 'ProjectActivity'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'ProjectActivity'),
			));
	}

	public function actionCreate($id) {
		$model = new ProjectActivity;
		$phase = $this->loadModel($id, 'ProjectPhase');

		if (isset($_POST['ProjectActivity'])) {
		
			$model->setAttributes($_POST['ProjectActivity']);
			$model->phase_id = $id;
			$model->author_id = Yii::app()->user->id;
			
			if ($model->save()) {
			
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		
		$this->render('create', array( 'model' => $model,'phase'=>$phase));
	
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'ProjectActivity');
		$phase = $this->loadModel($model->phase_id, 'ProjectPhase');

		if (isset($_POST['ProjectActivity'])) {
			$model->setAttributes($_POST['ProjectActivity']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		
		$this->render('update', array(
				'model' => $model,
				'phase' => $phase,
				));
		
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'ProjectActivity')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new ProjectActivity('search');
		$model->unsetAttributes();

		if (isset($_GET['ProjectActivity']))
			$model->setAttributes($_GET['ProjectActivity']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new ProjectActivity('search');
		$model->unsetAttributes();

		if (isset($_GET['ProjectActivity']))
			$model->setAttributes($_GET['ProjectActivity']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
