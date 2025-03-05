<?php

class EmployeeEmploymentController extends GxController {

	
	
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
				'model' => $this->loadModel($id, 'EmployeeEmployment'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'EmployeeEmployment'),
			));
	}

	public function actionCreate( $id ) {
		
		$staff = $this->loadModel($id, 'Employee');
		
		//check if staff already existing
		if(empty($staff->id)){
			Yii::app()->user->setFlash('error', '<b>No stafff found associated with the number.</b>');
			$this->redirect(array('//hr/employee/admin'));
		}
		
		$model = new EmployeeEmployment;


		if (isset($_POST['EmployeeEmployment'])) {
			$model->setAttributes($_POST['EmployeeEmployment']);

			if ($model->save()) {
				Yii::app()->user->setFlash('success', '<b>Staff employment details added successfully!</b>');
				$this->redirect(array('//hr/employee/view', 'id' => $id));
			}
		}
		
		$this->render('create', array( 'model' => $model,'staff'=>$staff));
		
	}

	public function actionUpdate($id) {
	
		$model = $this->loadModel($id, 'EmployeeEmployment');

		$staff = $this->loadModel($model->pfNumber->id, 'Employee');
		
		if (isset($_POST['EmployeeEmployment'])) {
			$model->setAttributes($_POST['EmployeeEmployment']);

			if ($model->save()) {
				Yii::app()->user->setFlash('success', '<b>Staff employment details updated successfully!</b>');
				$this->redirect(array('//hr/employee/view', 'id' => $id));
			}
		}
		$this->render('update', array( 'model' => $model,'staff'=>$staff));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'EmployeeEmployment')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new EmployeeEmployment('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeEmployment']))
			$model->setAttributes($_GET['EmployeeEmployment']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new EmployeeEmployment('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeEmployment']))
			$model->setAttributes($_GET['EmployeeEmployment']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
