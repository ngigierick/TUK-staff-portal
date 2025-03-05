<?php
Yii::import('application.modules.hr.models.*');
Yii::import('application.modules.user.models.User');
Yii::import('application.modules.help.models.*');
class GrantController extends GxController
{
	public function actionAdmin(){
		$this->pageTitle = "My Research Grants ".$this->pageTitle;
		$this->render('admin', array('applications' => ResearchGrant::myApplications()));
	}
	public function actionSubmit($id=''){
		$this->pageTitle = "Add Research Grant ".$this->pageTitle;
		$data = ResearchGrant::processModel($id);
		$model = $data['model'];
		if (empty($data['message'])) $this->redirect(array('admin'));
		$this->render('add',array('model'=>$model));
	}
	public function actionView($token,$mdfgdWERT123456TY122){
		$this->pageTitle = "View Research Grant ".$this->pageTitle;
		$this->render('view',array('model'=>ResearchGrant::viewModel($token,$mdfgdWERT123456TY122)));
	}
	public function actionDisbursement($token,$mdfgdWERT123456TY122){
		$this->pageTitle = "Request Disbursement ".$this->pageTitle;
		$data = ResearchGrant::processDisbursement($token,$mdfgdWERT123456TY122);
		$model = $data['model'];
		if (empty($data['message'])) $this->redirect(array('view','token'=>$token,'mdfgdWERT123456TY122'=>$mdfgdWERT123456TY122));
		$this->render('disbursement',array('model'=>$model));
	}
	public function actionSurrender($token,$mdfgdWERT123456TY122){
		$this->pageTitle = "Surrender Documents for Disbursement ".$this->pageTitle;
		$data = ResearchGrantClaim::processSurrender($token,$mdfgdWERT123456TY122);
		$model = $data['model'];
		if (empty($data['message'])) $this->redirect(array('view','token'=>$token,'mdfgdWERT123456TY122'=>$model->grant_id));
		$this->render('surrender',array('model'=>$model));
	}
	public $keyWords = "staff portal, tuk staff, staff profiles";
	public $description = "Staff portal for the Technical University of Kenya. This portal provides a centralized one-stop place where a staff can get access to the University Services";
	public function filters() {
		return array('accessControl');
	}
	public function accessRules() {
		return array(
				array('allow', 
					'actions'=>array(
					'admin',
					'submit',
					'view',
					'disbursement',
					'surrender',
					'renew',
					),
					'roles'=>array(9999),
					),
				array('deny', 
				'users'=>array('*'),
				),
		);
	}
}