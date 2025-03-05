<?php

class DocumentationCategoryController extends GxController {

	public $pageTitle = ':: TuSOFT Management System';
	
	
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
				'model' => $this->loadModel($id, 'DocumentationCategory'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'DocumentationCategory'),
			));
	}

	public function actionCreate() {
		$model = new DocumentationCategory;


		if (isset($_POST['DocumentationCategory'])) {
			$model->setAttributes($_POST['DocumentationCategory']);

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
		$model = $this->loadModel($id, 'DocumentationCategory');


		if (isset($_POST['DocumentationCategory'])) {
			$model->setAttributes($_POST['DocumentationCategory']);

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
			$this->loadModel($id, 'DocumentationCategory')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new DocumentationCategory('search');
		$model->unsetAttributes();

		if (isset($_GET['DocumentationCategory']))
			$model->setAttributes($_GET['DocumentationCategory']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
	
		$this->pageTitle = 'Categories of Documentation - Help Center '.$this->pageTitle;
		$model = new DocumentationCategory('search');
		$model->unsetAttributes();

		if (isset($_GET['DocumentationCategory']))
			$model->setAttributes($_GET['DocumentationCategory']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
