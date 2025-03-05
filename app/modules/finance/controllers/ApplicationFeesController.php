<?php

class ApplicationFeesController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('delete'),
				'roles'=>array(1),
				),
			array('allow', 
				'actions'=>array('view','admin','minicreate', 'create','update','autocomplete'),
				'roles'=>array(2),
				),
			array('allow', 
				'actions'=>array('autocomplete'),
				'roles'=>array(3,999),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'ApplicationFees'),
		));
	}

	public function actionCreate() {
		$model = new ApplicationFees;
		$this->performAjaxValidation($model, 'application-fees-form');

		if (isset($_POST['ApplicationFees'])) {
			$model->setAttributes($_POST['ApplicationFees']);
			
			$criteria = new CDbCriteria;
			$criteria->select='MAX(id) as receiptnumber';
			$receipt=ApplicationFees::model()->find($criteria);
			$recptno = dechex( $receipt->receiptnumber++ );
			$recptno = str_pad( $recptno, 10, "0", STR_PAD_LEFT );
			$recptno = 'A'.(strtoupper($recptno));
			$model->receiptnumber = $recptno;

			if ($model->save()) {
				Yii::app()->user->setFlash('success', '<b>Application Fees Payment</b><br/>Application fees for '.$model->salutation.' '.$model->surname.' '.$model->firstname.' '.$model->othername.' has been submitted successful!');
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'ApplicationFees');

		$this->performAjaxValidation($model, 'application-fees-form');

		if (isset($_POST['ApplicationFees'])) {
			$model->setAttributes($_POST['ApplicationFees']);

			if ($model->save()) {
				Yii::app()->user->setFlash('success', '<b>Application Fees Payment</b><br/>Application fees for '.$model->salutation.' '.$model->surname.' '.$model->firstname.' '.$model->othername.' has been updated successful!');
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'ApplicationFees')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('ApplicationFees');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new ApplicationFees('search');
		$model->unsetAttributes();

		if (isset($_GET['ApplicationFees']))
			$model->setAttributes($_GET['ApplicationFees']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionAutocomplete () {
	  if (isset($_GET['term'])) {
	  
		$criteria=new CDbCriteria;
		
		$criteria->condition = "LOWER(name) like '%" .strtolower( $_GET['term']) . "%'";
		
		$dataProvider=new CActiveDataProvider('Programme', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));

		$data = $dataProvider->getData();

		$return_array = array();
		foreach($data as $d) {
		  $return_array[] = array(
						'label'=>$d->name,
						'value'=>$d->name,
						'id'=>$d->code,
						);
		}

		echo CJSON::encode($return_array);
	  }
	}

}