<?php

class DefaultController extends Controller
{
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Institution');
		$this->render('/institution/index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Institution('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Institution']))
			$model->attributes=$_GET['Institution'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
}