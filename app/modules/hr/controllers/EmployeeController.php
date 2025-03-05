<?php
Yii::import('application.modules.finance.models.*');
class EmployeeController extends GxController {

	
	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array(
				'admin', 
				'create',
				'update',
				'view',
				'fullSearch',
				),
				'roles'=>array(19),
				),
			array('allow', 
				'actions'=>array(
				'fullSearch', 
				),
				'roles'=>array(9999),
				),
		
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'Employee'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'Employee'),
			));
	}

	public function actionCreate() {
		$model = new Employee;


		if (isset($_POST['Employee'])) {
		
			$model->setAttributes($_POST['Employee']);
			
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
		$model = $this->loadModel($id, 'Employee');


		if (isset($_POST['Employee'])) {
			$model->setAttributes($_POST['Employee']);

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
			$this->loadModel($id, 'Employee')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Employee('search');
		$model->unsetAttributes();

		if (isset($_GET['Employee']))
			$model->setAttributes($_GET['Employee']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new Employee('search');
		$model->unsetAttributes();

		if (isset($_GET['Employee']))
			$model->setAttributes($_GET['Employee']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionFullSearch () {
	
	  if (isset($_GET['term'])) {
	  
		$criteria=new CDbCriteria;
		
		$criteria->condition = 
		" lower(pf_number) like '%" . strtolower($_GET['term']) . "%' 
		OR id_number like '%" . $_GET['term'] . "%' 
		OR lower(surname) like '%" . strtolower($_GET['term']) . "%' 
		OR lower(firstname) like '%" . strtolower($_GET['term']) . "%'
		OR lower(othername) like '%" . strtolower($_GET['term']) . "%'  
		";
	
		$dataProvider=new CActiveDataProvider('Employee', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));

		$data = $dataProvider->getData();

		$return_array = array();
		foreach($data as $d) {
	
			$id 	= $d->id;
			$label 	= $d->pf_number.' | '.$d->fullName();
			$value 	= $d->pf_number.' | '.$d->fullName();
			$return_array[] = array(
						'label'=>$label,
						'value'=>$value,
						'id'=>$d->id
						);
		}

		echo CJSON::encode($return_array);
	  }
	}

	

}
