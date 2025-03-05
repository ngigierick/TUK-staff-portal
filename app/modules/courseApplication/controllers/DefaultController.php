<?php
Yii::import('application.modules.intake.models.*');

class DefaultController extends GxController
{
	
	
	public $layout='//layouts/application';
	public $pageTitle = "Online Application for September 2014 Intake:: TUK Students Online Portal";
	
	public function filters() {
	return array(
			'accessControl', 
			);
	}

	public function accessRules() {
		return array(
				array('allow', 
					'actions'=>array('index','login','logout','help','requestPassword'),
					'users'=>array('*'),
					),
				array('allow', 
					'actions'=>array(
					
						'profile',
												
						),
					'roles'=>array(999),
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}
	public function getUserMessages(){
	
		$i = $this->applicantID();
		//Messages
		$where = "applicant_id = '".$i."' AND status_id=0 AND sender=1";
		
		$user = $this->loadModel($i, 'Applicant');
		
		$mailbox=new CActiveDataProvider(
			'ApplicantMail', array(
				'criteria'=>array(
				'condition'=>$where,
				),
				'pagination'=>array(
						'pageSize'=>20,
				),
		));

		$count = $mailbox->totalItemCount;

		if ($count==1) $message = "<h2 class='reply'><a href='index.php?r=courseApplication/personalDetails/mailbox'>Hi,  ".$user->firstname."! You have one new message.</a></h2>";
		else if ($count>1) $message = "<h2 class='reply'><a href='index.php?r=courseApplication/personalDetails/mailbox'>Hi,  ".$user->firstname."! You have ".$count." new messages. </a></h2>";
		else $message = "";
		
		$messages['txt'] = $message;
		$messages['count'] = $count;
		
		return $messages;
			
	}
	
	public function actionIndex()
	{
		//check if logged in
		if(isset(Yii::app()->user->id)){
					
			$this->redirect(Yii::app()->createUrl('//courseApplication/default/profile'));
			
		}
		
		
		$model = new PreApplicant;
		if (isset($_POST['PreApplicant'])) {
		
			$model->setAttributes($_POST['PreApplicant']);
			
			$applicant = PreApplicant::model()->find('email=:email OR mobile=:m', array(':email'=>$model->email,':m'=>$model->mobile));
			
			//if already registered
			if (isset($applicant->id)){
			
				Yii::app()->user->setFlash('warning', "<b>The account already exists, kindly just sign in to your account.</b> ");
				$this->redirect(array('login'));

			}	
			
			$model->date_modified = time();
			$model->status = 0;
			$model->passowrd = md5($model->passowrd);
			
			if ($model->save()) {
			
				Yii::app()->user->setFlash('success', "<b>Congratulations, your account has been created successfully, kindly sign in to proceed with the application. ");
				$this->redirect(array('login'));
			}
			
		}
		$this->render('index',array('model'=>$model));
	}
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	
		//-----------------------
		
		$model=new LoginForm;
		
		if(isset(Yii::app()->user->id)){
					
			$this->redirect(Yii::app()->createUrl('//courseApplication/default/profile'));
			
		}
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	/**
	 * Displays the request password page
	 */
	public function actionRequestPassword()
	{
	
		//-----------------------
		
		$model=new LoginForm;
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$applicant = PreApplicant::model()->find('email=:email', array(':email'=>$model->username));
	
			if(empty($applicant->id)){
			
				Yii::app()->user->setFlash('error', "<b>Sorry, we are unable to confirm the email address you have entered. Please try again.</b> ");
				$this->redirect(array('requestPassword'));
			}
			else {
			
				$password = $this->generatePassword();
				
				//update the new password
				$applicant->passowrd = md5($password);
				$applicant->email = $model->username;
				$applicant->save();
				
				$msg = "Dear applicant,<br />
				You have requested for a new password at The Technical University of Kenya Online Application Portal. 
				Your new password is: <b><i>".$password."</b><br /> 
				Kindly use it to login and complete your application process.";
				
				$subject = "New password for The Technical University of Kenya Online Application Portal";
				
				$email = $model->username;
				
				$this->sendFogottenPassword($msg, $email, $subject);
			

			}
			
		}
		// display the login form
		$this->render('request_password',array('model'=>$model));
	}
	
	function generatePassword($length = 8) {
	
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$count = mb_strlen($chars);

		for ($i = 0, $result = ''; $i < $length; $i++) {
			$index = rand(0, $count - 1);
			$result .= mb_substr($chars, $index, 1);
		}

		return $result;
	}
	
	/*
	* Send new password
	*/
	public function sendFogottenPassword($msg, $email, $subject )
	{
	
			
				
				//use 'contact' view from views/mail				
				$emailStatus = $this->messageTemplate( $msg, $email, $subject );
				
				//send
				if ($emailStatus) {
					Yii::app()->user->setFlash('success', "<b>A new password has been generated and sent to your email address. Use the new password to sign in. You can change this once logged in.</b> ");
					$this->redirect(array('login'));
				
				} else {
					Yii::app()->user->setFlash('error','Error while sending email: '.$emailStatus);
					$this->redirect(array('requestPassword'));
					
				}
				
	}
	
	public function messageTemplate( $msg, $email, $subject)
	{
	
		//initialize mail
		$mail = new YiiMailer('contact', array('message' => $msg, 'name' => 'The Technical University of Kenya Online Application Portal', 'description' => 'Contact form'));
		
		//format message		
		$msg = "<div style='font-family:Trebuchet MS;color:#00AFFD;font-size:13px'>".$msg."</div>";
		
		//set mail body with the formatted message
		$mail->Body = $msg;
		
		//we are using SMTP
		$mail->IsSMTP();

		//SMTP settings
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->CharSet="UTF-8";
		$mail->SMTPSecure = 'tls';
		
		$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only										   
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Host       = "smtp.gmail.com"; // sets the SMTP server
		$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
		$mail->Username   = "tu.kwebmaster@gmail.com"; // SMTP account username
		$mail->Password   = "liege0gmail";        // SMTP account password

		$mail->render();
		
		//set properties as usually with PHPMailer
		$mail->From = "tu.kwebmaster@gmail.com";
		$mail->FromName = "The Technical University of Kenya Online Application Portal";
		$mail->Subject = $subject;

		$mail->AddAddress($email);
	
		//send
		if ($mail->Send()) {
			$mail->ClearAddresses();
			return true;
		
		} else {
			return $mail->ErrorInfo;
		
		}
		
		$this->refresh();
	
	}
	
	
	/**
	* Display applicant profile
	*/
	public function actionProfile()
	{
		//user id
		$id = Yii::app()->user->id;
		$app = PreApplicant::model()->findByPk($id);
		
		$messages = $this->getUserMessages();
		
		//query for personal details
		$personalDetails = Applicant::model()->find('LOWER(email)=?',array(strtolower($app->email)));
		
		if (isset($personalDetails->id))
		//academic qualifications
		$academicQualifications = AcademicQualification::model()->findAll('app_id=:app',array(':app'=>$personalDetails->id));
	
			else $academicQualifications ="";
		
		
		if (isset($personalDetails->id)){
		
				$criteria->condition = "app_id = '".$personalDetails->id."'";
		
				$courses=new CActiveDataProvider('ApplicantCourse', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));
		}
		else $courses ="";
		
		$this->render(
			'profile',
			
			//parameters passed
			array(
			'app'=>$app,
			'personalDetails'=>$personalDetails,
			'academicQualifications'=>$academicQualifications,
			'courses'=>$courses,
			'messages'=>$messages,
			)
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
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionHelp()
	{
		$this->render('help');
		
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->createUrl('//portal/courseApplication'));
		
	}
}