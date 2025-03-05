<?php

class ProjectModuleTaskController extends GxController {

	
	
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
				'model' => $this->loadModel($id, 'ProjectModuleTask'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'ProjectModuleTask'),
			));
	}

	public function actionCreate($id) {
			
			$module = $this->loadModel($id, 'ProjectModule');
			$model = new ProjectModuleTask;


		if (isset($_POST['ProjectModuleTask'])) {
			$model->setAttributes($_POST['ProjectModuleTask']);
			$model->module_id = $id;
			$model->author_id = Yii::app()->user->id;
			if ($model->save()) {
			
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		
		$this->render('create', array( 'model' => $model,'module'=>$module));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'ProjectModuleTask');
		$module = $this->loadModel($model->id, 'ProjectModule');

		if (isset($_POST['ProjectModuleTask'])) {
				$model->setAttributes($_POST['ProjectModuleTask']);
				$model->module_id = $id;
				$model->author_id = Yii::app()->user->id;
				if ($model->save()) {
				
					$this->redirect(array('view', 'id' => $model->id));
				}
		}
		
		$this->render('update', array( 'model' => $model,'module'=>$module));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'ProjectModuleTask')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new ProjectModuleTask('search');
		$model->unsetAttributes();

		if (isset($_GET['ProjectModuleTask']))
			$model->setAttributes($_GET['ProjectModuleTask']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new ProjectModuleTask('search');
		$model->unsetAttributes();

		if (isset($_GET['ProjectModuleTask']))
			$model->setAttributes($_GET['ProjectModuleTask']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
