<?php

class AdminController extends Controller
{
	public $defaultAction = "admin";
	public $layout='//layouts/column1';
	
	/**
	* @return array action filters
	*/
	public function filters()
	{
		return array('accessControl');
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		return array(
			array('allow', // Allow superusers to access Rights
				'actions'=>array(
					'admin',
				),
				//'users'=>$this->_authorizer->getSuperusers(),
				'roles'=>array(1),
			),
			array('deny', // Deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionAdmin()
	{
		$model=new AuditTrail('search');
		$model->unsetAttributes();	// clear any default values
		if(isset($_GET['AuditTrail'])) {
			$model->attributes=$_GET['AuditTrail'];
		}
		$this->render('admin',array(
			'model'=>$model,
		));
	}
}