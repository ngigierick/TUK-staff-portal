<?php

class DefaultController extends GxController
{
	public $pageTitle = ':: TuSOFT Management System';
	
	public function actionIndex()
	{
		$this->redirect(array('//help/documentation/intro'));
	}
	
	public function actionIndex1()
	{
		$this->pageTitle = 'Help Center '.$this->pageTitle;
		$doc = Documentation::model()->findByPk(1);
		$this->render('index',array('doc'=>$doc));
	}
	public function actionDataEntryClerk()
	{
		$this->pageTitle = 'Help Center for Data Entry Officers :: '.$this->pageTitle;
		$doc = Documentation::model()->findByPk(2);
		$this->render('index',array('doc'=>$doc));
	}
}