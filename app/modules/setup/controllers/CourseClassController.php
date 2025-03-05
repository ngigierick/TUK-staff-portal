<?php

class CourseClassController extends GxController {

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
			'model' => $this->loadModel($id, 'CourseClass'),
		));
	}

	public function actionCreate() {
		$model = new CourseClass;

		$this->performAjaxValidation($model, 'course-class-form');

		if (isset($_POST['CourseClass'])) {
			$model->setAttributes($_POST['CourseClass']);
			$criteria = new CDbCriteria;
			$criteria->select='MAX(id) as id';
			$st=CourseClass::model()->find($criteria);
			$model->id=$st->id+2;

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->code));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'CourseClass');

		$this->performAjaxValidation($model, 'course-class-form');

		if (isset($_POST['CourseClass'])) {
			
			$model->setAttributes($_POST['CourseClass']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->code));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'CourseClass')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('CourseClass');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new CourseClass('search');
		$model->unsetAttributes();

		if (isset($_GET['CourseClass']))
			$model->setAttributes($_GET['CourseClass']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}