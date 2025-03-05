<?php

class DefaultController extends Controller
{
	public $layout='//layouts/portal';
	public $pageTitle = "TU-K Staff ePortal";
	
	
	public function actionIndex()
	{
		$session=new CHttpSession;
		$session->open();
		$session['student']=1;
		$this->redirect(Yii::app()->createUrl('//site/login'));
	}
}