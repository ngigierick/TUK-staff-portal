<?php
Yii::import('application.modules.admission.models.*');
class ReportController extends GxController {


	public function behaviors()
	{
			return array(
				'eexcelview'=>array(
					'class'=>'ext.eexcelview.EExcelBehavior',
				),
			);
	}
		
	public function filters() {
		return array(
				'accessControl', 
				);
	}

	public function accessRules() {
		return array(
				array('allow', 
					'actions'=>array('resultSubmission','resultProcessing'),
					'roles'=>array(15),
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}
	public function actionResultSubmission(){
	
		$criteria=new CDbCriteria();
		$criteria->condition = " category = 1"; 
		$criteria->order='id DESC';
		$submission=new CActiveDataProvider('ScoreProcessing', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100)));
		
		$this->render('submission', array('submission' => $submission));
		
	
	}
	public function actionResultProcessing(){
	
		$criteria=new CDbCriteria();
		$criteria->condition = " category = 2"; 
		$criteria->order='id DESC';
		$processed=new CActiveDataProvider('ScoreProcessing', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100)));
		
		$this->render('processed', array('processed' => $processed,));
		
	
	}
	
}
