<?php
Yii::import('application.modules.hr.models.*');
Yii::import('application.modules.user.models.*');
class EmployeeLeaveApplicationController extends GxController {

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
					'actions'=>array('apply','view','withdraw','process'),
					'roles'=>array(9999),
					),
				array('allow', 
					'actions'=>array('minicreate', 'create','update'),
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
	public function actionProcess($id){
		
		$this->pageTitle = 'Process Leave :: '.$this->pageTitle;
		$this->keyWords = "staff portal, tuk staff, staff profiles";
		$this->description = "Staff portal for the Technical University of Kenya. This portal provides a centralized one-stop place where a staff can get access to the University Services";
		$model = $this->loadModel($id, 'EmployeeLeaveApplication');
		if ($model->status!=0){
			Yii::app()->user->setFlash('error','<b>This leave application had been processed.</b>');
			$this->redirect(array('apply'));	
		}
		if ($model->hod_id!=Yii::app()->user->id){
			Yii::app()->user->setFlash('error','<b>You are not authorized to process this leave application, please contact Human Resource Office for more information.</b>');
			$this->redirect(array('apply'));	
		}
		if (isset($_POST['EmployeeLeaveApplication'])){
			$model->setAttributes($_POST['EmployeeLeaveApplication']);
			$message = $model->approveByHoD();
			if (!empty($message)){
				$model->status = 0;
				Yii::app()->user->setFlash('error',$message);
			}
			else{
				if ($model->status==1)Yii::app()->user->setFlash('error','Leave application for '.$model->staff.' rejected by you because of the reason: '.$model->hod_approval_remarks);
				if ($model->status==2)Yii::app()->user->setFlash('success','Leave application for '.$model->staff.' approved and forwarded to Human Resource ');
				$this->redirect(array('apply'));
			}
			
		}
	
		$this->render('process', array(
			'model' => $model,
		));
		
	}
	public function actionApply($id=''){

		$this->pageTitle = 'Apply for Leave '.$this->pageTitle;
		$this->keyWords = "staff portal, tuk staff, staff profiles";
		$this->description = "Staff portal for the Technical University of Kenya. This portal provides a centralized one-stop place where a staff can get access to the University Services";
		$model = new EmployeeLeaveApplication;
		$leave ='';
		$summary='';
		$days='';
		$error='';
		$error2='';
		if  (!empty($id)){
			if ($id==1) $days = ' Working Days'; else $days = ' Calendar Days';
			$leave = EmployeeLeave::model()->findByPk($id);
			$user=Employee::model()->findByPk(Yii::app()->user->id);
			if ($user->current_employment_id<1){
				$error = 1;
				Yii::app()->user->setFlash('error','<b>Sorry '.$user->names().', kindly visit the Human Resources Office to update your employment information in order to apply for a leave.</b>');
			}
			else if (EmployeeLeave::pendingLeave(Yii::app()->user->id)){						
				Yii::app()->user->setFlash('error','<b>Dear '.$user->names().', it seems your application is waiting to be processed or you are still on leave away from work.</b>');
				$error = 1;
			}
			else if ( ($user->gender_id==1) && ($id==2) ){
				$error = 1;
				Yii::app()->user->setFlash('error','<b>Sorry '.$user->names().', kindly note that you are not eligible for '.$leave->name.'</b>');
			}
			else if ( ($user->gender_id==2) && ($id==3) ){
				$error = 1;
				Yii::app()->user->setFlash('error','<b>Sorry '.$user->names().', kindly note that you are not eligible for '.$leave->name.'</b>');
			}		
			else{
				
				$summary = EmployeeLeave::compute($id, Yii::app()->user->id, $user->employment->grade_id);
				$summary['id'] = $id; //id of the leave
				//not legible for compassionate leave
				if (isset($summary['notCompassionate'])){
					$error = 1;	
					$summary = '';
					Yii::app()->user->setFlash('error','<b>Sorry '.$user->names().', kindly note that you are not eligible for '.$leave->name.' since you have not exhausted your Annual leave days.</b>');
				}
				else{
					
					//submitted form
					if (isset($_POST['EmployeeLeaveApplication'])) {
						$model->setAttributes($_POST['EmployeeLeaveApplication']);
						$data = EmployeeLeave::daysDiff($id, $model->start_date,$model->end_date,$model->hod_id);
						$summary['requested'] = $data['requested'];
						//no dates selected
						if  (isset($data['nodate']) ) {
							$error2 = 1;
							Yii::app()->user->setFlash('error','<b>Sorry '.$user->names().', you are kindly required to select both start date and end date for your leave.</b>');
						}
						//print_r($data);exit;
						//notice missing
						//else if  (isset($data['notice']) ) {
							//$error2 = 1;
							//Yii::app()->user->setFlash('error','<b>Sorry '.$user->names().', notice days should be observed before starting your leave.</b>');
						//}
						//wrong start and end dates
						
						/*else*/ if  ($summary['requested']<0 ) {
							$error2 = 1;
							Yii::app()->user->setFlash('error','<b>Sorry '.$user->names().', you have selected invalid starting and ending dates, please try again.</b>');
							
						}
						
						else if (empty($data['hod_id'])){
							$error2 = 1;
							Yii::app()->user->setFlash('error','<b>Sorry '.$user->names().', kindly select your HOD/Reporting Officer.</b>');
						}						
						else if (Employee::sameAs($data['hod_id'])){
							$error2 = 1;
							Yii::app()->user->setFlash('error','<b>Sorry '.$user->names().', you cannot be your own HOD/Reporting Officer.</b>');
						}
						else{
							
							//correct dates selected but days exhausted					
							
							if ($summary['requested']>$summary['rem']){
								
									$error2 = 1;
									Yii::app()->user->setFlash('error','<b>Sorry '.$user->names().', you have requested for '.$summary['requested'].$days.' which exceed the remaining '.$summary['rem'].$days.' for '.$leave.', please try lesser days.</b>');
							}
							else {
									
									//
									$summary['s'] 				= $model->start_date;
									$summary['e'] 				= $model->end_date;
									$summary['expected_start'] 	= $data['expected_start'];
									$summary['expected_end'] 	= $data['expected_end'];
									$summary['expected_reporting'] = $data['expected_reporting'];
									$summary['report'] 				= $data['report'];
									$summary['hod'] 				= $data['hod'];
									$summary['hod_id'] 				= $data['hod_id'];
									
									if (!empty($model->date_modified)){
										
										//is there pending leave
										if (EmployeeLeave::pendingLeave(Yii::app()->user->id)){
											
											Yii::app()->user->setFlash('error','<b>Dear '.$user->names().', it seems you are still away from work, kindly exhaust your ongoing leave days before applying for another.</b>');
										}
										else{
											
											//final submission
											$model->leave_id 	= $id;
											$model->staff_id 	= Yii::app()->user->id;
											$model->total_days 	= $summary['total'];
											$model->taken_days 	= $summary['requested'];
											$model->rem_days 	= $summary['rem'] - $summary['requested'];
											$model->report_date = $summary['report'];
											
											$model->status 		= 0;
											$model->is_latest = true;
											
											if ($model->save()){
												EmployeeLeave::updateLeave($model->id, Yii::app()->user->id, $model->hod_id);
												Yii::app()->user->setFlash('success','<b>Dear '.$user->names().', your application has been submitted to your Supervisor.</b>');
												$this->redirect(array('view', 'id' => $model->id));
											}
											else{
												
												Yii::app()->user->setFlash('error','<b>Dear '.$user->names().', errors have been encountered while processing your application.<br />'.CHtml::errorSummary($model).'</b>');
											}
										}
									}
									else{
										$this->render('apply3', array('model'=>$model, 'leave' => $leave,'summary' => $summary, 'days'=>$days,'error'=>$error,'error2'=>$error2));
										exit;
									} 
								}
						}
						
					}
				}
				
			}	
			$this->render('apply2', array('model'=>$model, 'leave' => $leave,'summary' => $summary, 'days'=>$days,'error'=>$error,'error2'=>$error2));
			
		}
		else{
			
			$leaves 		= EmployeeLeave::model()->findAll();	
			$applications 	= EmployeeLeaveApplication::model()->findAll('staff_id='.Yii::app()->user->id);
			$others     	= EmployeeLeaveApplication::model()->findAll('hod_id='.Yii::app()->user->id);			
			$this->render('apply', array('leaves' => $leaves,'others' => $others, 'model'=>$model,'applications'=>$applications));
		}
		
	}

	public function actionView($id) {
		
		$this->pageTitle = 'My Leave Application :: '.$this->pageTitle;
		$this->keyWords = "staff portal, tuk staff, staff profiles";
		$this->description = "Staff portal for the Technical University of Kenya. This portal provides a centralized one-stop place where a staff can get access to the University Services";
		
		$model = $this->loadModel($id, 'EmployeeLeaveApplication');
		
		if (isset($_POST['pdf'])){
			
			$mPDF1 = Yii::app()->ePdf->mpdf('P', 'A4');
		
			//annual/compassionate
			if (($model->leave->id==1) || ($model->leave->id==4))
			$mPDF1->WriteHTML($this->renderPartial('view_pdf', array(	'model'=>$model),true));
			else if (($model->leave->id==2) || ($model->leave->id==3))
				$mPDF1->WriteHTML($this->renderPartial('view1_pdf', array(	'model'=>$model),true));
			else { echo "No appropriate form found for download"; exit;}
				//provide the output	
			$mPDF1->Output('LeaveForm.pdf','I');
			exit;
		}
	
		$this->render('view', array(
			'model' => $model,
		));
	
	}

	public function actionCreate() {
		$model = new EmployeeLeaveApplication;


		if (isset($_POST['EmployeeLeaveApplication'])) {
			$model->setAttributes($_POST['EmployeeLeaveApplication']);

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
		$model = $this->loadModel($id, 'EmployeeLeaveApplication');


		if (isset($_POST['EmployeeLeaveApplication'])) {
			$model->setAttributes($_POST['EmployeeLeaveApplication']);

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
	
	public function actionWithdraw($id) {
				
			$this->loadModel($id, 'EmployeeLeaveApplication')->delete();
			Yii::app()->user->setFlash('warning','<b>The leave application has been withdrawn.</b>');
			$this->redirect(array('apply'));
		
	}

	public function actionIndex() {
		$model = new EmployeeLeaveApplication('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeLeaveApplication']))
			$model->setAttributes($_GET['EmployeeLeaveApplication']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new EmployeeLeaveApplication('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeLeaveApplication']))
			$model->setAttributes($_GET['EmployeeLeaveApplication']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
