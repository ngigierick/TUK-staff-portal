<?php

class DependantController extends GxController {

	
	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin', 'create','update','view','getDependants'),
				'roles'=>array(13,14,15),
				),
			array('allow', 
				'actions'=>array('admin', 'view','getDependants'),
				'roles'=>array(13),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'Dependant'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'Dependant'),
			));
	}

	public function actionCreate() {
		$model = new Dependant;


		if (isset($_POST['Dependant'])) {
			$model->setAttributes($_POST['Dependant']);
			$model->status = 1;
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
		$model = $this->loadModel($id, 'Dependant');


		if (isset($_POST['Dependant'])) {
			$model->setAttributes($_POST['Dependant']);

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
			$this->loadModel($id, 'Dependant')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Dependant('search');
		$model->unsetAttributes();

		if (isset($_GET['Dependant']))
			$model->setAttributes($_GET['Dependant']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new Dependant('search');
		$model->unsetAttributes();

		if (isset($_GET['Dependant']))
			$model->setAttributes($_GET['Dependant']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionGetDependants($id){
	
		$dependant = Dependant::model()->findAll('staff_id=:id', array(':id'=>$id));;
		echo CHtml::dropDownList('dependant', '',GxHtml::listDataEx($dependant));
		//echo "got them".$id;
		Yii::app()->end();

	
	}

}
