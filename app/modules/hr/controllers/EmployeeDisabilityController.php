<?php

class EmployeeDisabilityController extends GxController {

	
	
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
				'model' => $this->loadModel($id, 'EmployeeDisability'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'EmployeeDisability'),
			));
	}

	public function actionCreate($id) {
		
		$staff = $this->loadModel($id, 'Employee');
		
		//check if staff already existing
		if(empty($staff->id)){
			Yii::app()->user->setFlash('error', '<b>No stafff found associated with the number.</b>');
			$this->redirect(array('//hr/employee/admin'));
		}
		
		$model = new EmployeeDisability;


		if (isset($_POST['EmployeeDisability'])) {
			$model->setAttributes($_POST['EmployeeDisability']);

			$model->setAttributes($_POST['EmployeeDisability']);

			if ($model->save()) {
				Yii::app()->user->setFlash('success', '<b>Staff disability details added successfully!</b>');
				$this->redirect(array('//hr/employee/view', 'id' => $id));
			}
		}
		
		$this->render('create', array( 'model' => $model,'staff'=>$staff));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'EmployeeDisability');
		$staff = $this->loadModel($model->pfNumber->id, 'Employee');

		if (isset($_POST['EmployeeDisability'])) {
			$model->setAttributes($_POST['EmployeeDisability']);

			if ($model->save()) {
				Yii::app()->user->setFlash('success', '<b>Staff disability details updated successfully!</b>');
				$this->redirect(array('//hr/employee/view', 'id' => $staff->id));
			}
		}
		$this->render('update', array( 'model' => $model,'staff'=>$staff));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'EmployeeDisability')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new EmployeeDisability('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeDisability']))
			$model->setAttributes($_GET['EmployeeDisability']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new EmployeeDisability('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeDisability']))
			$model->setAttributes($_GET['EmployeeDisability']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
