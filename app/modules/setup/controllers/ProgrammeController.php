<?php

class ProgrammeController extends GxController {

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
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Programme'),
		));
	}

	public function actionCreate() {
		$model = new Programme;

		$this->performAjaxValidation($model, 'programme-form');

		if (isset($_POST['Programme'])) {
			$model->setAttributes($_POST['Programme']);
			//generate new course code
			//$model->code = $this->getCourseCode($model->department_id,$model->type_id);
			$criteria = new CDbCriteria;
			$criteria->select='MAX(id) as id';
			$p=Programme::model()->find($criteria);
			$num = $p->id;
			$num = $num+1; 
			$model->id = $num;
			
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Programme');

		$this->performAjaxValidation($model, 'programme-form');

		if (isset($_POST['Programme'])) {
			$model->setAttributes($_POST['Programme']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Programme')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Programme');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Programme('search');
		$model->unsetAttributes();

		if (isset($_GET['Programme']))
			$model->setAttributes($_GET['Programme']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}