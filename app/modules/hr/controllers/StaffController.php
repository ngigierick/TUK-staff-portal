<?php
Yii::import('application.modules.medical.models.*');
class StaffController extends GxController {

	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin', 'create','update','view','getDependants'),
				'roles'=>array(13,14),
				),
			array('allow', 
				'actions'=>array('admin','view',),
				'roles'=>array(13,14),
				),
			array('allow', 
				'actions'=>array('searchByPF','searchPF'),
				'roles'=>array(13,14),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}


	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'Staff'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'Staff'),
			));
	}

	public function actionCreate() {
		$model = new Staff;


		if (isset($_POST['Staff'])) {
			$model->setAttributes($_POST['Staff']);
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
		$model = $this->loadModel($id, 'Staff');


		if (isset($_POST['Staff'])) {
			$model->setAttributes($_POST['Staff']);

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
			$this->loadModel($id, 'Staff')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Staff('search');
		$model->unsetAttributes();

		if (isset($_GET['Staff']))
			$model->setAttributes($_GET['Staff']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new Staff('search');
		$model->unsetAttributes();

		if (isset($_GET['Staff']))
			$model->setAttributes($_GET['Staff']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionSearchByPF () {
	  if (isset($_GET['term'])) {
	  
		$criteria=new CDbCriteria;
		
		$criteria->condition = "pf_number like '%" . $_GET['term'] . "%'";
		
		$dataProvider=new CActiveDataProvider('Staff', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));

		$data = $dataProvider->getData();

		$return_array = array();
		foreach($data as $d) {
		  $return_array[] = array(
						'label'=>$d->firstname.' '.$d->surname.' '.$d->othername.' ('.$d->pf_number.')',
						'value'=>$d->firstname.' '.$d->surname.' '.$d->othername.' ('.$d->pf_number.')',
						'id'=>$d->id,
						);
		}

		echo CJSON::encode($return_array);
	  }
	}
	public function actionSearchPF () {
	  if (isset($_GET['term'])) {
	  
		$criteria=new CDbCriteria;
		
		$criteria->condition = "pf_number like '%" . $_GET['term'] . "%'";
		
		$dataProvider=new CActiveDataProvider('Staff', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));

		$data = $dataProvider->getData();

		$return_array = array();
		foreach($data as $d) {
		  $return_array[] = array(
						'label'=>$d->firstname.' '.$d->surname.' '.$d->othername.' ('.$d->pf_number.')',
						'value'=>$d->firstname.' '.$d->surname.' '.$d->othername.' ('.$d->pf_number.')',
						'id'=>$d->pf_number,
						);
		}

		echo CJSON::encode($return_array);
	  }
	}
	
	public function actionGetDependants(){
	
		echo "got them";
	
	}

}
