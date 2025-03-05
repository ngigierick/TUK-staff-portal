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
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
	
	public function actionAdmin()
	{
		$accepted = new Accepted;
		$this->render('admin',array('model'=>$accepted));
	}
}