<?php

Yii::import('application.modules.hr.models.*');
Yii::import('application.modules.user.models.User');
Yii::import('application.modules.help.models.*');
class ApplicantController extends GxController {
	public function actionDownloadFile($location,$file){Yii::app()->utility->downloadPrivateFile($location.$file); }
	public function actionExchange($id='',$st='') {
		$this->render('exchange', array('model' => ApplicantHelper::exchange($id,$st)));}
	public function actionView($id) {		
		$this->render('view', array('model' => viewOperation($id)));}
	public function actionAccount(){
		$this->render('account', array('model' => ApplicantHelper::accountSearch()));}
	public function actionFullView( $id ){
		$data = ApplicantHelper::fullView($id);
		if (empty($data)) $this->redirect(array('account'));
		$this->render('fullProfile', array(
			'details'=>$data['app'],
			'courses'=>$data['courses'],
			'academicQual'=>$data['academicQual'],
		));
	}
	public function actionFullView2( $id ){
		$data = ApplicantHelper::fullView2($id);
		if (empty($data)) $this->redirect(array('account'));
		$this->render('fullProfile', array(
			'details'=>$data['app'],
			'courses'=>$data['courses'],
			'academicQual'=>$data['academicQual'],
		));
	}
	public function actionResetPassword( $id ) {
		$id2 = ApplicantHelper::resetPassword($id);
		if (empty($id2)) $this->redirect(array('account'));
		$this->redirect(array('fullView','id'=>$id2));
	}
	public function actionApplicantSearch () {
		echo CJSON::encode(ApplicantHelper::searchApplicant());
	}
	public function actionProspectiveSearch () {
		echo CJSON::encode(ApplicantHelper::searchProspective());
	}
	public function actionFullSearch () {
		echo CJSON::encode(ApplicantHelper::searchApplicantFull());
	}		
	public function actionSummary() {
		$this->render('reports/summary', array(
			'summaries'=>AppCourse::summaries(),
			'sc'=>AppCourse::scholarships()
		));
	}
	public function actionDailyApplications() {
		$data = ApplicantHelper::dailyApplications();
		$this->render('reports/daily', array(
			'date'=>$data['date'],
			'number'=>$data['number'],
			'model'=>$data['model'],
			
		));
	}
	public function actionDailyAccounts() {
		$data = ApplicantHelper::dailyAccounts();
		$this->render('reports/daily_account', array(
			'date'=>$data['date'],
			'number'=>$data['number'],
			'model'=>$data['model'],
		));
	}
	public function actionPerCourse($st='') {	
		$data = ApplicantHelper::perCourseView($st);
		$this->render('reports/per_course', array('data'=>$data['d'],'count'=>$data['c'],));
	}
	public function actionApplicantsList() {	
		$data = ApplicantHelper::applicantsList($this);
		if (!empty($data['apps'])) $this->render('reports/list', array('data'=>$data));
		else $this->render('reports/list_search',array('model'=>$data['model']));
	}
	public function actionSearch() {
		$this->render('search/search_applicant', array(
		'model' => ApplicantHelper::searchLink()));
	}	
	public function accessRules() {
		return Yii::app()->linkManager->controllerAccessControls($this->id);
	}

}