<?php

class DefaultController extends Controller
{
	public $layout='//layouts/column1';
	
	public function filters() {
	return array(
			'accessControl', 
			);
	}
	
	public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('index'),
				'roles'=>array(1),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
}