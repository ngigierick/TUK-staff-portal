<?php

class DocumentationController extends GxController {

	public $layout='//layouts/column1';
	public $pageTitle = 'Documentation - Help Center:: TuSOFT Management System';
	
	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view','intro'),
				'users'=>array('*'),
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
				'model' => $this->loadModel($id, 'Documentation'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'Documentation'),
			));
	}

	public function actionCreate() {
		$model = new Documentation;


		if (isset($_POST['Documentation'])) {
			$model->setAttributes($_POST['Documentation']);
			$model->author_id = Yii::app()->user->id;
			$model->date_added = time();

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('create', array( 'model' => $model));
		else
			$this->renderPartial('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Documentation');


		if (isset($_POST['Documentation'])) {
			$model->setAttributes($_POST['Documentation']);

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
			$this->loadModel($id, 'Documentation')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Documentation('search');
		$model->unsetAttributes();

		if (isset($_GET['Documentation']))
			$model->setAttributes($_GET['Documentation']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new Documentation('search');
		$model->unsetAttributes();

		if (isset($_GET['Documentation']))
			$model->setAttributes($_GET['Documentation']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionIntro() {
		$this->pageTitle = 'About TuSOFT '.$this->pageTitle;
		
		$criteria=new CDbCriteria;
		$criteria->condition = "category_id = 2";
		$criteria->order='id ASC';
		$intro=new CActiveDataProvider('Documentation', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>1000)));
		
		$this->render('intro', array(
			'intro' => $intro,
		));
	}

}
