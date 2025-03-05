<?php
Yii::import('application.modules.finance.models.*');
class EmployeeBankController extends GxController {

	
	
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
				'model' => $this->loadModel($id, 'EmployeeBank'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'EmployeeBank'),
			));
	}

	public function actionCreate($id) {
		$staff = $this->loadModel($id, 'Employee');
		
		//check if staff already existing
		if(empty($staff->id)){
			Yii::app()->user->setFlash('error', '<b>No stafff found associated with the number.</b>');
			$this->redirect(array('//hr/employee/admin'));
		}
		
		$model = new EmployeeBank;

		if (isset($_POST['EmployeeBank'])) {
			
			$model->setAttributes($_POST['EmployeeBank']);
			if ($model->save()) {
				Yii::app()->user->setFlash('success', '<b>Staff bank details added successfully!</b>');
				$this->redirect(array('//hr/employee/view', 'id' => $id));
			}
		}
		$this->render('create', array( 'model' => $model,'staff'=>$staff));
	}

	public function actionUpdate($id) {
		
		$model = $this->loadModel($id, 'EmployeeBank');
		$staff = $this->loadModel($model->pfNumber->id, 'Employee');

		if (isset($_POST['EmployeeBank'])) {
			$model->setAttributes($_POST['EmployeeBank']);

			if ($model->save()) {	
				Yii::app()->user->setFlash('success', '<b>Staff bank details updated successfully!</b>');
				$this->redirect(array('//hr/employee/view', 'id' => $id));
			}
		}
		$this->render('create', array( 'model' => $model,'staff'=>$staff));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'EmployeeBank')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new EmployeeBank('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeBank']))
			$model->setAttributes($_GET['EmployeeBank']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new EmployeeBank('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeBank']))
			$model->setAttributes($_GET['EmployeeBank']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
