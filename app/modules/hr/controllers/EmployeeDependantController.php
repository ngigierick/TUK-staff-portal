<?php

class EmployeeDependantController extends GxController {

	
	
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
				'model' => $this->loadModel($id, 'EmployeeDependant'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'EmployeeDependant'),
			));
	}

	public function actionCreate( $id ) {
		$model = new EmployeeDependant;
		$staff = $this->loadModel($id, 'Employee');
		
		//check if staff already existing
		if(empty($staff->id)){
			Yii::app()->user->setFlash('error', '<b>No stafff found associated with the number.</b>');
			$this->redirect(array('//hr/employee/admin'));
		}

		if (isset($_POST['EmployeeDependant'])) {
			$model->setAttributes($_POST['EmployeeDependant']);

			if ($model->save()) {
				Yii::app()->user->setFlash('success', '<b>Staff dependants details added successfully!</b>');
				$this->redirect(array('//hr/employee/view', 'id' => $id));
			}
		}
		
		$this->render('create', array( 'model' => $model,'staff'=>$staff));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'EmployeeDependant');
		$staff = $this->loadModel($model->pfNumber->id, 'Employee');

		if (isset($_POST['EmployeeDependant'])) {
			$model->setAttributes($_POST['EmployeeDependant']);

			if ($model->save()) {
				Yii::app()->user->setFlash('success', '<b>Staff dependant details updated successfully!</b>');
				$this->redirect(array('//hr/employee/view', 'id' => $staff->id));
			}
		}
		$this->render('update', array( 'model' => $model,'staff'=>$staff));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'EmployeeDependant')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new EmployeeDependant('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeDependant']))
			$model->setAttributes($_GET['EmployeeDependant']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new EmployeeDependant('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeDependant']))
			$model->setAttributes($_GET['EmployeeDependant']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
