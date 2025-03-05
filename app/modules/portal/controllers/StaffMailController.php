<?php
Yii::import('application.modules.hr.models.*');
Yii::import('application.modules.user.models.*');
class StaffMailController extends GxController {


	public $feeitems;
	public $total;	
	public $header;
	public $keyWords = "staff portal, tuk staff, staff profiles";
	public $description = "Staff portal for the Technical University of Kenya. This portal provides a centralized one-stop place where a staff can get access to the University Services";
	
	public function filters() {
		return array(
				'accessControl', 
				);
	}

	public function accessRules() {
		return array(
				array('allow',
					'actions'=>array('admin','view','accept','approve'),
					'roles'=>array(9999),
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}
	public function actionAdmin()
	{
		$this->pageTitle = 'My Mail Messages '.$this->pageTitle;
		UserActivity::record('view',"Viewed own mails");
		$inbox = StaffMail::received();
		$sent = StaffMail::sent();		
		$this->render('admin', array('inbox'=>$inbox,'sent'=>$sent));
	}
	public function actionView($id) {
		
		$mail = $this->loadModel($id,'StaffMail');
		$mail->setRead();		
		$this->pageTitle = $mail->subject.'-'.$this->pageTitle;
		$mails = array();
		$mails[] = $mail;
		$parent_mails = StaffMail::getParent($mails, $mail);
							
		$this->render('view', array(
			'model' => $mail,
			'parent_mails'=>$parent_mails,
		));
		
	}
	
	public function actionApprove($id,$st) {
		$this->pageTitle = 'Reject Application '.$this->pageTitle;
		$mail = $this->loadModel($id,'StaffMail');
		$app = $this->loadModel($mail->item_id,'EmployeeLeaveApplication');
		if ($st==2) $this->redirect(array('accept', 'id' => $app->id,'m' => $mail->id));
		$app->approve($st,$id);
		if ($st==2) $a = 'Approved'; else $a = 'Rejected';
		$details = $a.' leave application for '.$app->staff->fullName();
		Yii::app()->user->setFlash('info',$details );
		UserActivity::record('add',$details);
		$this->redirect(array('view', 'id' => $id));
		
	}
	public function actionAccept($id,$m) {
		$this->pageTitle = 'Approve Application '.$this->pageTitle;
		$app = $this->loadModel($id,'EmployeeLeaveApplication');
		User::setupSession('staff_id',$app->staff_id);
		$mail = $this->loadModel($m,'StaffMail');
		if (isset($_POST['incharge'])) {
			$incharge = Employee::model()->findByPk($_POST['incharge']);
			
			if (empty($incharge->id)){
				Yii::app()->user->setFlash('error','Please choose staff member' );
			}else if (EmployeeLeave::pendingLeave($incharge->id)){
				Yii::app()->user->setFlash('error',$incharge->fullName().' is still on leave or is planning to go on leave at the same time, please select a different person' );
			}else{
				$app->while_away_staff_id = $incharge->id;
				$app->approve(2,$id);
				$a = 'Approved';
				User::destroySessionValue('staff_id');
				$details = $a.' leave application for '.$app->staff->fullName();
				Yii::app()->user->setFlash('info',$details );
				UserActivity::record('add',$details);
				$this->redirect(array('admin'));
			}
			
		}	
		$this->render('approve', array('app' => $app,'mail' => $mail));	
	}
	public function actionCreate() {
		$model = new StaffMail;


		if (isset($_POST['StaffMail'])) {
			$model->setAttributes($_POST['StaffMail']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('create', array( 'model' => $model));
		else
			$this->renderPartial('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'StaffMail');


		if (isset($_POST['StaffMail'])) {
			$model->setAttributes($_POST['StaffMail']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('update', array(
				'model' => $model,
				));
		else
			$this->renderPartial('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'StaffMail')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	
}
