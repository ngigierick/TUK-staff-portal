<?php
Yii::import('application.modules.intake.models.*');
Yii::import('application.modules.user.models.StudentMailbox');
class PersonalDetailsController extends GxController {

	public $layout='//layouts/application';
	
	public $pageTitle = "Online Application for September 2014 Intake:: TUK Students Online Portal";
	public $header;
	
	public function filters() {
	return array(
			'accessControl', 
			);
	}

	public function accessRules() {
		return array(
				
				array('allow', 
					'actions'=>array(
					
						'add',
						'edit',
						'preview',
						'fullView',
						'password',
						'mailbox',
						'sendMail',
						'viewMail',
						'reply',
						
						
						),
					'roles'=>array(999),
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}
	
	/**
	* Retrieve applicant ID from Pre-applicant
	*/
	public function applicantID()
	{
	
		$id = Yii::app()->user->id;
		$app = PreApplicant::model()->findByPk($id);
		
		//query for personal details
		$app = Applicant::model()->find('LOWER(email)=?',array(strtolower($app->email)));
		
		//id
		return $app->id;
	}
	/**
	* Add personal details
	*/
	public function actionAdd()
	{
		$academic_year_id = 27;//2014/2015
		
		//user id
		$model=new Applicant;
		
		if (isset($_POST['Applicant'])){
			
			$model->setAttributes($_POST['Applicant']);
			$id = Yii::app()->user->id;
			$app = PreApplicant::model()->findByPk($id);
			
			$criteria = new CDbCriteria;
			$criteria->select='MAX(id) as id';
			$a=Applicant::model()->find($criteria);
			$num = $a->id;
			////<><><><>
			$model->id = $num+1;
			$model->status = 0;
			$model->ethnicity_id = 1;
			$model->programme_id = "EEEI";//place holder
			$model->academicyear_id = $academic_year_id;//2014/2015
			$model->module_id = 2;//module II
			$model->email = $app->email;
			$model->mobile = $app->mobile;
			$model->passowrd = $app->passowrd;
			
			if($model->save()){
			
				Yii::app()->user->setFlash('success', "<b>Congratulations, your personal details has been saved successfully, kindly proceed and enter your academic qualifications.</b> ");
				$this->redirect(Yii::app()->createUrl('//courseApplication/default/profile'));
			}
			
			
			
		}
		$this->render('_form',array('model'=>$model));
	}
	
	/**
	* Add personal details
	*/
	public function actionEdit( $id )
	{
		//user id
		$model = Applicant::model()->findByPk($id);
		
		if (isset($_POST['Applicant'])){
		
			
			$id = Yii::app()->user->id;
			$app = PreApplicant::model()->findByPk($id);
			$model->setAttributes($_POST['Applicant']);
			$model->ethnicity_id = 1;
			$model->passowrd = $app->passowrd;
			
			
			if($model->save()){
			
				Yii::app()->user->setFlash('success', "<b>Your personal details have been updated successfully.</b> ");
				$this->redirect(Yii::app()->createUrl('//courseApplication/default/profile'));
			}
		
		}
		
		$this->render('_form',array('model'=>$model));
		
	}
	
	
	/**
	* Preview form
	*/
	public function actionPreview( )
	{
		$academic_year_id = 27;//2014/2015
				
		$serial = array('I','II','III','IV','V','VI','VII','VIII','IX','X');
		//query for personal details
		$i = $this->applicantID();
		$app = Applicant::model()->findByPk($i);
		$courses = ApplicantCourse::model()->findAll('app_id=?',array($app->id));
		
		//update the reference numbers
		$number = Applicant::model()->count('academicyear_id=?',array($academic_year_id));
		
		
		//update application references
		for($i=0;$i<count($courses);$i++){
			
			$ref = (count($courses)>1)? '/'.$serial[$i]:''; $ref = $courses[$i]->programme_id.'/'.str_pad( $number, 10, "0", STR_PAD_LEFT ).$ref;
			if ($courses[$i]->status == 0){
			
				$courses[$i]->app_ref = $ref;
				$courses[$i]->date_printed = time();
				$courses[$i]->save();
			}
		}
		
		$academicQual = AcademicQualification::model()->findAll('app_id=:app',array(':app'=>$app->id));
		
		if (isset($_REQUEST['pdf'])){
		
			$generator = date('F j, Y, g:i a',time());
			$mPDF1 = Yii::app()->ePdf->mpdf($app->surname, 'A4');
			$mPDF1->WriteHTML(
				$this->renderPartial(
				
					'pdf',
					array(
						
						'details'=>$app,
						'courses'=>$courses,
						'academicQual'=>$academicQual,
						'serial'=>$serial,
					)
				,true));
				
			$mPDF1->Output();
		}
		else
			$this->render('preview',
			array(
				'details'=>$app,
				'courses'=>$courses,
				'academicQual'=>$academicQual,
				'serial'=>$serial,
			));
		
		
	}
	
	/**
	* Preview form
	*/
	public function actionFullView( )
	{
	
		$academic_year_id = 27;//2014/2015
				
		$serial = array('I','II','III','IV','V','VI','VII','VIII','IX','X');
		//query for personal details
		$i = $this->applicantID();
		$app = Applicant::model()->findByPk($i);
		$courses = AppCourse::model()->findAll('app_id=?',array($app->id));
		
		//update the reference numbers
		$number = Applicant::model()->count('academicyear_id=?',array($academic_year_id));
		
		
		//update application references
		for($i=0;$i<count($courses);$i++){
			
			$ref = (count($courses)>1)? '/'.$serial[$i]:''; $ref = $courses[$i]->programme_id.'/'.str_pad( $number, 10, "0", STR_PAD_LEFT ).$ref;
			if ($courses[$i]->status == 0){
			
				$courses[$i]->app_ref = $ref;
				$courses[$i]->date_printed = time();
				$courses[$i]->save();
			}
		}
		
		$academicQual = AcademicQualification::model()->findAll('app_id=:app',array(':app'=>$app->id));
		
		if (isset($_REQUEST['pdf'])){
		
			$generator = date('F j, Y, g:i a',time());
			$mPDF1 = Yii::app()->ePdf->mpdf($app->surname, 'A4');
			$mPDF1->WriteHTML(
				$this->renderPartial(
				
					'pdf',
					array(
						
						'details'=>$app,
						'courses'=>$courses,
						'academicQual'=>$academicQual,
						'serial'=>$serial,
					)
				,true));
				
			$mPDF1->Output();
		}
		else
			$this->render('fullProfile',
			array(
				'details'=>$app,
				'courses'=>$courses,
				'academicQual'=>$academicQual,
				'serial'=>$serial,
			));
		
		
	}
	
	public function actionPassword() {
	
		$this->pageTitle = 'Change Password '.$this->pageTitle;
		
		$id = Yii::app()->user->id;
		$model = PreApplicant::model()->findByPk($id);
		
			//try to restore student admission form values with applicant data - incase of error
		if (isset($_POST['current']) && (isset($_POST['new'])&& (isset($_POST['confirm'])))){
			
			//first change of password
			if ($_POST['new']!==$_POST['confirm']){
					Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> The new password has not been confirmed correctly.");
				
				}
				else if ($model->passowrd !== md5($_POST['current'])){
				
					Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> The new current passowrd is not valid.");
				}
				else{
				
					$model->passowrd = md5($_POST['confirm']);
					if ($model->save()) Yii::app()->user->setFlash('success', "<b>Success Changing Password</b><br/> Your new password has been generated successfully.");
					else Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> Error while creating your new password, report this to the ICT center(email:webmaster@tukenya.ac.ke).");
				}
				
			
			
		}
		
		$this->render('password',array( 'model' => $model));		
		
	
	}
	
	public function actionViewMail($id) {
		
		$this->pageTitle = 'Mail Message - '.$this->pageTitle;
		
		$mail = $this->loadModel($id,'ApplicantMail');
							
		if ($mail->sender_id === 1)
		{
			
			$mail->status_id = 1;
			$mail->sender = 1;
			$mail->save();
		}
		
		$mail = $this->loadModel($id,'ApplicantMail');
		
		$mails = array();
		$mails[] = $mail;
		$parent_mails = $this->getParent($mails, $mail);
							
		$this->render('mymailbox/view', array(
			'model' => $mail,
			'parent_mails'=>$parent_mails,
		));
		
	}
	
	public function getParent( $mails, $mail ){
	
		
		if(!empty($mail->parent_id)){
		
			$parent = $this->loadModel($mail->parent_id,'ApplicantMail');
			$mails[] = $parent;
			
			return $this->getParent( $mails, $parent );
		
			
		}
		else{
				
			krsort($mails);
			return $mails;
		}
	
	}
	

	public function actionMailbox($id='')
	{
		$this->pageTitle = 'My Mailbox '.$this->pageTitle;
		
		$i = $this->applicantID();
		
		if (empty($id)){
			
			$this->header = "Inbox - Received Items";
			$where = "applicant_id = '".$i."' AND sender = 1 ";
			
		}
		else{
			$this->header = "Sent Items";
			$where = "applicant_id = '".$i."' AND sender <> 1 ";
			
		}
		
		$model=new ApplicantMail('search');
		
		$mailbox=new CActiveDataProvider('ApplicantMail', array(
											'criteria'=>array(
												'condition'=>$where,
												'order'=>'id DESC',
											),
											'pagination'=>array(
											'pageSize'=>20,
					),
		));
		
		if (empty($id)){
		
			$this->render('mymailbox/admin',array(
				'model'=>$model,
				'mailbox'=>$mailbox,
			));
		}
		else{
		
			$this->render('mymailbox/admin_sent',array(
				'model'=>$model,
				'mailbox'=>$mailbox,
			));
		}
	}
	public function actionSendMail()
	{
		
		$this->pageTitle = 'Send Mail '.$this->pageTitle;
		$model=new ApplicantMail;
		
		$i = $this->applicantID();
		
		if(isset($_POST['ApplicantMail']))
		{
			
			$support = User::model()->findAll('role_id=:role', array(':role'=>16));//16 is the role for support
			
			//<><><><><><><><>
			$model->attributes=$_POST['ApplicantMail'];
			$model->sender = 0;//tstudent denoted by 0
			$model->applicant_id = $i;//is the applican
			$model->status_id =0;//unread
			$model->date_modified = time();
			$model->date_created = time();
			
			
			//<><><>send to all support teams
			$err='';
			for ($i=0;$i<count($support);$i++)
			{
				$mail=new ApplicantMail;
				$mail->setAttributes($model->getAttributes(),false);
				$mail->support_id = $support[$i]->id;
				if (!$mail->save()) $err .= CHtml::errorSummary($mail);
			}
			
			$user = $this->loadModel($i,'Applicant');
			
			//<><><>redirect student after successful save	
			if (!empty($err)) Yii::app()->user->setFlash('error', '<b>Mail Message</b><br/> Sorry '.$user->surname.' '.$user->firstname.' '.$user->othername.'! The operation failed '.$err);
			else if (count($support)<1)
			Yii::app()->user->setFlash('warning', '<b>Mail Message</b><br/> Sorry '.$user->surname.' '.$user->firstname.' '.$user->othername.'! The student support officer is currently not available. Please try again later.');
			else Yii::app()->user->setFlash('success', '<b>Mail Message</b><br/> '.$user->surname.' '.$user->firstname.' '.$user->othername.'! your mail has been sent successfully. Thank you for contacting us.');
			$this->redirect(array('mailbox'));
				
			
				
		}
		$this->render('mymailbox/create',array(
			'model'=>$model,
		));
	}
	public function actionReply($id)
	{
		$mail=$this->loadModel($id,'ApplicantMail');
		
		$mails = array();
		$mails[] = $mail;
		$parent_mails = $this->getParent($mails, $mail);
		
		$model=new ApplicantMail;
		
		
		
		if(isset($_POST['ApplicantMail']))
		{
			$model->attributes=$_POST['ApplicantMail'];
			$model->sender = 0;
				
			if (!$model->save()) {echo CHtml::errorSummary($model); exit;}
							
			else{
			
				Yii::app()->user->setFlash('success','Message sent!');
					
				$this->redirect(array('//courseApplication/default/profile'));
				
				
			}	
		}
		$this->render('mymailbox/reply/update',array(
			'model'=>$model,
			'mail'=>$mail,
			'parent_mails'=>$parent_mails,
		));

		
	}

}
