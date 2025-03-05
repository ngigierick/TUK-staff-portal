<?php

class PositionController extends GxController {

	
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
				'model' => $this->loadModel($id, 'Position'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'Position'),
			));
	}

	public function actionCreate() {
		$model = new Position;


		if (isset($_POST['Position'])) {
			$model->setAttributes($_POST['Position']);

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
		$model = $this->loadModel($id, 'Position');


		if (isset($_POST['Position'])) {
			$model->setAttributes($_POST['Position']);

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
			$this->loadModel($id, 'Position')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Position('search');
		$model->unsetAttributes();

		if (isset($_GET['Position']))
			$model->setAttributes($_GET['Position']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new Position('search');
		$model->unsetAttributes();

		if (isset($_GET['Position']))
			$model->setAttributes($_GET['Position']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
