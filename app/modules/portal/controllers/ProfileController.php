<?php
Yii::import('application.modules.hr.models.*');
Yii::import('application.modules.user.models.User');
Yii::import('application.modules.help.models.*');
class ProfileController extends GxController
{

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
					'actions'=>array(
					'home',
					'help',
					'public',
					'list',
					'recoverPassword',
					'securePassword',
					'updatePDFs',
					'updateStaffProfiles',
					'searchInterest'
					
					),
					'users'=>array('*'),
					),
				array('allow', 
					'actions'=>array(
					'statement',
					'view',
					'fullProfile',
					'password',
					'update',
					'personalInfo',
					'mailbox',
					'sendMail',
					'viewMail',
					'reply',
					'admissionForm',
					'passport',
					'payslip',
					'xzy5677',
					'answerSecurityQuestion',
					'securityQuestion',
					'analytics',
					'documents',
					'documentView',
					'documentDownload',
					'photo',
					'contacts',
					'p9',
					'xzy5677G',
					),
					'roles'=>array(9999),
					),
				array('deny', 
				'users'=>array('*'),
				),
		);
	}
	public function actionContacts(){
		$data 	= EmployeeContact::processModel();
		$model 	= $data['model'];
		if (empty($data['message'])) $this->redirect(array('view'));
		$this->render('account/update_contacts',array('model'=>$model));
	}
	public function actionSearchInterest(){
		if (isset($_GET['term'])) {
			$criteria=new CDbCriteria;
			$criteria->condition = " lower(interest_area) like '%" . strtolower($_GET['term']) . "%'";
			$dataProvider=new CActiveDataProvider('EmployeeContact', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));
			$data = $dataProvider->getData();
			$return_array = array();
			foreach($data as $d) {
				$id 	= $d->id;
				$label 	= $d->interest_area;
				$value 	= $d->interest_area;
				$return_array[] = array(
							'label'=>$label,
							'value'=>$value,
							'id'=>$d->id
							);
			}
			echo CJSON::encode($return_array);
	  }
	}
	public function actionIndex()
	{
		$this->pageTitle = 'Welcome to the Staff ePortal :: '.$this->pageTitle;
		$this->keyWords = "staff portal, tuk staff, staff profiles";
		$this->description = "Staff portal for the Technical University of Kenya. This portal provides a centralized one-stop place where a staff can get access to the University Services";
		$this->redirect(Yii::app()->createUrl('//portal/profile/home'));
	}
	public function actionDocuments()
	{
		$this->layout='//layouts/column1';
		$this->pageTitle = 'Staff Documents :: '.$this->pageTitle;
		$this->keyWords = "staff portal, tuk staff, staff profiles, staff documents";
		$this->description = "Documents for staff in the Technical University of Kenya";
		if(!empty($_REQUEST['term']))
		{
			$str = $_REQUEST['term'];
			$terms = explode(" ",$str);
			

			$criteria=new CDbCriteria;
			
			$sql ='';
			$sql .="	lower(title) 	like '%" . strtolower($terms[0]) . "%'";
			
			for ($i=0;$i<count($terms);$i++){
				
				$sql .="or	lower(title) 	like '%" . strtolower($terms[$i]) . "%'";
				$sql .="or	lower(description) 	like '%" . strtolower($terms[$i]) . "%'";
				
				
			}
			
			$criteria->condition = $sql;
			
	
			$dataProvider=new CActiveDataProvider('EmployeeDocument', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100)));

			$data = $dataProvider->getData();
			
			$this->render('account/documents',array('data'=>$data,'term'=>$str));
			
		}
		else{
			
			$criteria=new CDbCriteria;
			$criteria->order = 'id DESC';
			$dataProvider=new CActiveDataProvider('EmployeeDocument', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100)));
			$data = $dataProvider->getData();
			$this->render('account/documents',array('data'=>$data));
		}
		
	}
	public function actionDocumentView($id) {
		
		$model= $this->loadModel($id, 'EmployeeDocument');
		EmployeeDocument::submitAction($id,3);
		$this->pageTitle = $model->title.' :: '.$this->pageTitle;
		$this->render('account/view_document', array(
			'model' => $model,
		));
		
	}
	public function actionDocumentDownload($id) {
		
		$model= $this->loadModel($id, 'EmployeeDocument');
		EmployeeDocument::submitAction($id,4);
		$filename = $model->filename;
		$path = Yii::app()->linkManager->staffDocumentsFolder().'/'.$filename;
		Yii::app()->utility->downloadPrivateFile($path);
		
	}
	public function actionHome()
	{
		$this->pageTitle = 'Welcome to the Staff ePortal :: '.$this->pageTitle;
		$this->keyWords = "staff portal, tuk staff, staff profiles";
		$this->description = "Staff portal for the Technical University of Kenya. This portal provides a centralized one-stop place where a staff can get access to the University Services";
		if(!empty($_REQUEST['term']))
		{
			$str = $_REQUEST['term'];
			$terms = explode(" ",$str);
			$criteria=new CDbCriteria;
			$sql ='';
			$sql .="	lower(t.firstname) 	like '%" . strtolower($terms[0]) . "%'";
			for ($i=0;$i<count($terms);$i++){
				
				$sql .="or	lower(firstname) 	like '%" . strtolower($terms[$i]) . "%'";
				$sql .="or	lower(surname) 	like '%" . strtolower($terms[$i]) . "%'";
				$sql .="or	lower(othername) 	like '%" . strtolower($terms[$i]) . "%'";
				
			}
			$criteria->condition = $sql;
			$dataProvider=new CActiveDataProvider('Employee', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100000)));
			$data = $dataProvider->getData();
			
			//results for links
			$criteria=new CDbCriteria;
			$sql ='';
			$sql .="lower(label_name) 	like '%" . strtolower($terms[0]) . "%' OR lower(description) 	like '%" . strtolower($terms[0])."'";
			for ($i=0;$i<count($terms);$i++){
				
				$sql .=" or	lower(label_name) 	like '%" . strtolower($terms[$i]) . "%' OR lower(description) 	like '%" . strtolower($terms[0])."'";
				$sql .=" or	lower(label_name) 	like '%" . strtolower($terms[$i]) . "%' OR lower(description) 	like '%" . strtolower($terms[0])."'";
				$sql .=" or	lower(label_name) 	like '%" . strtolower($terms[$i]) . "%' OR lower(description) 	like '%" . strtolower($terms[0])."'";
				
			}
			$criteria->condition = $sql;
			$results = StaffMenuLink::model()->findAll($criteria);
			$this->render('account/search_results',array('data'=>$data,'results'=>$results,'term'=>$str));
			
		}
	    else $this->render('account/home');
	}
	
	public function actionHelp()
	{
		$this->pageTitle = 'Help Desk :: '.$this->pageTitle;
		$this->keyWords = "staff portal help, tuk staff, staff profiles";
		$this->description = "Get help on how to use Staff Portal for the Technical University of Kenya";
		$this->render('account/help');
	}

	public function actionRecoverPassword()
	{
		
		$this->pageTitle = 'Recover Password:: '.$this->pageTitle;
		$this->keyWords = "staff portal help, tuk staff, staff profiles";
		$this->description = "Forgot login password? Set a new password";
		
		$model=new LoginForm;
		$user='';
		$data = '';
		if(isset($_POST['LoginForm']))
		{
				$model->attributes=$_POST['LoginForm'];
				$p=$_POST['LoginForm'];  
				
				$user=Employee::model()->find('LOWER(pf_number)=?',array(strtolower($model->username)));
				
				
				
				if($user===null){
					
					Yii::app()->user->setFlash('error','No staff found matching the details entered.');
					$activity = new UserActivity();
					$activity->agent = "user : username ".$model->username." - ".CHttpRequest::getUserHostAddress();
					$activity->category = 11;
					$activity->details = "entered wrong user name for password recovery ".CHttpRequest::getUserHostAddress();
					$activity->date_recorded = time();
					$activity->save();
				}
				else{
					
				
					if ((!isset($user->securityQuestion)) && (!isset($_POST['index']))){
						
						//generate random questions
						$n = mt_rand(0,2);
						$question[0] = "Please enter your National ID/ Passport number.";
						$question[1] = "Please tell us when you were born.";
						$question[2] = "Please tell us when you were employed in the University.";
						
												
						$data['question'] = $question[$n];
						$data['index'] = $n;
						
						
					}
					else{
						
						//if answere
						
						if(isset($p['security_answer'])){
							
							$answer = $p['security_answer'];
							if($user->security_answer==md5($answer)){
									
								$session=new CHttpSession;
								$session->open();
								$session['cvvvvqwrrr'] = $user->id;
								$this->redirect(Yii::app()->createUrl('//portal/profile/securePassword'));
							}
							else if (isset($_POST['index'])){
									
								if ((($_POST['index']==0)&&($user->id_number==$answer)) || (($_POST['index']==1)&&($user->dob==$answer)) || (($_POST['index']==2)&&($user->doe==$answer))){
									
									Yii::app()->user->setFlash('success','Correct Answer!');
									$session=new CHttpSession;
									$session->open();
									$session['cvvvvqwrrr'] = $user->id;
									$this->redirect(Yii::app()->createUrl('//portal/profile/securePassword'));
								}
									
								else{
									
									Yii::app()->user->setFlash('error','We cannot accertain your identity or account. Kindly contact the administrator for further assistant.');
									$activity = new UserActivity();
									$activity->agent = "user : username ".$model->username." - ".CHttpRequest::getUserHostAddress();
									$activity->category = 11;
									$activity->details = "wrong answer for security question ".CHttpRequest::getUserHostAddress();
									$activity->date_recorded = time();
									$activity->save();
									$this->redirect(Yii::app()->createUrl('//site/login'));
								}
							}
							else{
								
									Yii::app()->user->setFlash('error','We cannot accertain your identity or account. Kindly contact the administrator for further assistant.');
									$activity = new UserActivity();
									$activity->agent = "user : username ".$model->username." - ".CHttpRequest::getUserHostAddress();
									$activity->category = 11;
									$activity->details = "wrong answer for security question ".CHttpRequest::getUserHostAddress();
									$activity->date_recorded = time();
									$activity->save();
									$this->redirect(Yii::app()->createUrl('//site/login'));
							}
						}
						
						
					}
						
				
			}
		}
		$this->render('account/recover_password',array('model'=>$model,'data'=>$data, 'user'=>$user));
	}
	public function actionView() {
		
		
		$this->pageTitle = 'Staff Account Profile '.$this->pageTitle;
		
		//control user tabs using sessions
		$session=new CHttpSession;
		$session->open();
		$session['page']=isset($session['page'])?$session['page']:1;
		
		$id = Yii::app()->user->id;
		$model = $this->loadModel($id, 'Employee');
		
		
		//update qualification
		if ($model->highest_qualification_id<1) $this->updateHighestQualifications($model->pf_number);
		if ($model->current_designation_id<1) $this->updateCurrentDesignation($model->pf_number);
		
		//check if changed password
		if(empty($model->password)){
			Yii::app()->user->setFlash('warning', "<h3>Kindly set your password before you continue.</h3>");
			$this->redirect(Yii::app()->createUrl('//portal/profile/password'));
		}
		
		$name = $model->names();
		
		$this->pageTitle = strtoupper($name.' :: '.$this->pageTitle);
		$this->keyWords = $model->firstname.', '.$model->othername.', '.$model->surname;
		$this->description = "Staff Profile for ".$name." at the Technical University of Kenya";
				
		$activity = new UserActivity();
		$activity->agent = "staff with ID : ".$model->id;
		$activity->category = 1;
		$activity->theuser = $model->id;
		$activity->user_cat =4;
		$activity->details = "staff viewed own profile ";
		$activity->date_recorded = time();
		$activity->save();
		
		
		//$messages = $this->getUserMessages();
		
		
		$this->render('employee/view', array(
			'model' => $model,
			'page' => $session['page'],
			'messages'=>'',
			
		));
	}
	
	public function actionFullProfile($pdf='') {
		
		$id = Yii::app()->user->id;
		$model = $this->loadModel($id, 'Employee');
		$emp = Position::model()->findByPk($model->current_designation_id);
		$emp = (isset($emp->name))?$emp->name.', '.$emp->office:'';
		
		$qual = EmployeeQualificationLevel::model()->findByPk($model->highest_qualification_id);
		$qual = (isset($hq->name))?$hq->name:'';
		
		$name = $model->names();
		
		
		$this->keyWords = $model->firstname.', '.$model->othername.', '.$model->surname;
		$this->description = "Profile for ".$name.", ".$emp.", ".$qual." at the Technical University of Kenya";
		
				
		$activity = new UserActivity();
		$activity->agent = "staff with ID : ".$model->id;
		$activity->category = 8;
		$activity->theuser = $model->id;
		$activity->user_cat = 4;
		$activity->details = "staff viewed own full profile ";
		$activity->date_recorded = time();
		$activity->save();
		
		$this->pageTitle = strtoupper($name.' :: '.$this->pageTitle);
	
		
		//profile views
		$profile_views = new EmployeeProfileView();
		$profile_views->category = 4;
		$profile_views->date_viewed = $profile_views->date_modified = time();
		$profile_views->user_id = $id;
		$profile_views->profile_id = $id;
		$profile_views->save();
		
		
		if ($pdf==1){
					
				$id = Yii::app()->user->id;
				$user = User::model()->findByPk($id);
		
				$mPDF1 = Yii::app()->ePdf->mpdf('P', 'A4');
		
				$mPDF1->WriteHTML(
						///<><><>
						$this->renderPartial('employee/full_view_pdf', array(
								'model'=>$model,
								'user'=>$model->surname,
						)
						,true));
				//provide the output	
				$mPDF1->Output($model->names().'.pdf','D');
				exit;
		}
				
				
			//own view of public profile	
		if (isset(Yii::app()->user->id)){
			
			//update profile document	
			$this->updateProfileDocument();
			
			$this->render('employee/full_view_own', array(
			'model' => $model,
			'messages'=>'',
			
			));
		}
			
		//public view of your profile
		else $this->render('employee/full_view', array(
			'model' => $model,
			'messages'=>'',
			'public'=>1,
			
			));
	}
	public function actionPublic($id, $pdf='') {
		
		$model = $this->loadModel($id, 'Employee');
		if ($model->status==7) {echo "We are sorry! This profile or page you are looking for might had been removed.";exit;}
		$emp = Position::model()->findByPk($model->current_designation_id);
		$emp = (isset($emp->name))?$emp->name.', '.$emp->office:'';
		
		$qual = EmployeeQualificationLevel::model()->findByPk($model->highest_qualification_id);
		$qual = (isset($hq->name))?$hq->name:'';
		
		$name = $model->title.' '.$model->firstname.' '.$model->othername.' '.$model->surname;
		
		$this->pageTitle = strtoupper($name.' :: '.$this->pageTitle);
		
		$this->keyWords = $model->firstname.', '.$model->othername.', '.$model->surname;
		$this->description = "Profile for ".$name.", ".$emp.", ".$qual." at the Technical University of Kenya";
		
		//profile views
		$profile_views = new EmployeeProfileView();
		$profile_views->date_viewed = $profile_views->date_modified = time();
		$profile_views->profile_id = $id;
		if (isset(Yii::app()->user->id)){
			
			$profile_views->user_id = Yii::app()->user->id; 
			$profile_views->category = 3;
		} 
		else{
			
			$profile_views->user_id=0;
			$profile_views->category = 1;
		} 
		
		$profile_views->save();
		
		
		if ($pdf==1){
					
						
				$mPDF1 = Yii::app()->ePdf->mpdf('P', 'A4');
		
				$mPDF1->WriteHTML(
						///<><><>
						$this->renderPartial('employee/full_view_pdf', array(
								'model'=>$model,
								'user'=>$model->surname,
						)
						,true));
				//provide the output	
				$mPDF1->Output($model->names().'.pdf','D');
				exit;
		}
				
		$this->render('employee/full_view', array(
			'model' => $model,
			'messages'=>'',
			'public'=>1,
			
		));
	}
	
	public function actionAnalytics() {
		
		$this->pageTitle = "Who Viewed My Profile :: ".$this->pageTitle;
		
		$id = Yii::app()->user->id;
		$model = $this->loadModel($id, 'Employee');		
		$criteria = new CDbCriteria;
		$criteria->condition = 	'profile_id='.$id;	
		$criteria->order='id DESC';
		$views = EmployeeProfileView::model()->findAll($criteria);	
		
		$this->render('employee/analytics', array(
			'views' => $views,	
			'model'=>$model,
		));	
	}	
	
	public function actionUpdate() {
		
		
		$this->pageTitle = 'Update Profile '.$this->pageTitle;
		$id = Yii::app()->user->id;
		$model = $this->loadModel($id, 'Employee');
		
		
		if (isset($_POST['Employee'])) {
			$model->setAttributes($_POST['Employee']);
			$model->status =1;
			if ($model->save()) {
			
				
				
				$activity = new UserActivity();
				$activity->agent = "staff with ID : ".$id;
				$activity->category = 5;
				$activity->theuser = $id;
				$activity->user_cat = 4;
				$activity->details = "staff updated own profile ";
				$activity->date_recorded = time();
				$activity->save();
				
				 if (Yii::app()->request->isAjaxRequest)
                 {
                    echo CJSON::encode(array(
                        'status'=>'success', 
                        'div'=>" You have successfully updated your profile details"
                        ));
                    exit;               
                 }
		
				 else{
				 	 
					Yii::app()->user->setFlash('success', "<b>Success Updating Profile</b><br/> You have successfully updated your profile details.");
				 	$this->redirect(array('view'));
				 }
				
			}
		}
		
		if (Yii::app()->request->isAjaxRequest)
        {
            echo CJSON::encode(array(
                'status'=>'failure', 
                'div'=>$this->renderPartial('employee/update', array('model'=>$model), true)));
            exit;               
        }

		$this->render('employee/update', array(
				'model' => $model,
				));
	}
	
	public function actionPassword() {
		$this->pageTitle = 'Change Password '.$this->pageTitle;
		$reg_number = Yii::app()->user->name;
		$id = Yii::app()->user->id;
		$model = Employee::model()->find('pf_number=:reg', array(':reg'=>$reg_number));
		
			//try to restore student admission form values with applicant data - incase of error
		if ((isset($_POST['current']) || isset($_POST['id_number'])) && (isset($_POST['new'])&& (isset($_POST['confirm'])))){
			
			//first change of password
			if (isset($_POST['id_number'])){
				
				$st = Employee::model()->find('id_number=:id', array(':id'=>$_POST['id_number']));
				
				if (empty($st)){
					Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> The ID/ Passport number entered seems invalid.");
					
					$activity = new UserActivity();
					$activity->agent = "staff with ID : ".$id;
					$activity->category = 11;
					$activity->theuser = $id;
					$activity->user_cat = 4;
					$activity->details = "Failure Changing Password.The ID/ Passport number entered seems invalid.";
					$activity->date_recorded = time();
					$activity->save();
					
				}
				else if (strlen($_POST['new'])<5){
					Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> New passowrd must be at least 5 characters.");
					
					$activity = new UserActivity();
					$activity->agent = "staff with ID : ".$id;
					$activity->category = 11;
					$activity->theuser = $id;
					$activity->user_cat = 4;
					$activity->details = "Failure Changing Password. New Password must be at least 5 characters.";
					$activity->date_recorded = time();
					$activity->save();
					
				}
				else if ($_POST['new']!==$_POST['confirm']){
					Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> The new password has not been confirmed correctly.");
					
					$activity = new UserActivity();
					$activity->agent = "staff with ID : ".$id;
					$activity->category = 11;
					$activity->theuser = $id;
					$activity->user_cat = 4;
					$activity->details = "Failure Changing Password.The new password has not been confirmed correctly.";
					$activity->date_recorded = time();
					$activity->save();
				
				}
				else{
				
					$model->password = md5($_POST['confirm']);
					$activity = new UserActivity();
					$activity->agent = "student with ID : ".$id;
					$activity->category = 7;
					$activity->theuser = $id;
					$activity->user_cat = 4;
					$activity->details = "Success Changing Password. Your new password has been generated successfully.";
					$activity->date_recorded = time();
					$activity->save();
					
					if ($model->save()){
						
						Yii::app()->user->setFlash('success', "<b>Success Changing Password</b><br/> Your new password has been generated successfully.");
						$this->redirect(array('view'));
					} 
					else Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> Error while creating your new password, report this to the ICT center(email:webmaster@tukenya.ac.ke).");
				}
				
			}
			else if(isset($_POST['current'])){
					
				$current = md5($_POST['current']);
				
				if($current !== $model->password){
					Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> The current password entered does NOT match your actual current password.");
					
					$activity = new UserActivity();
					$activity->agent = "student with ID : ".$id;
					$activity->category = 11;
					$activity->theuser = $id;
					$activity->user_cat = 4;
					$activity->details = "Failure Changing Password.The current password entered does NOT match your actual current password.";
					$activity->date_recorded = time();
					$activity->save();
					
				}
				else if (strlen($_POST['new'])<5){
					Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> New passowrd must be at least 5 characters.");
					
					$activity = new UserActivity();
					$activity->agent = "staff with ID : ".$id;
					$activity->category = 11;
					$activity->theuser = $id;
					$activity->user_cat = 4;
					$activity->details = "Failure Changing Password. New passowrd must be at least 5 characters.";
					$activity->date_recorded = time();
					$activity->save();
					
				}
				else if ($_POST['new']!==$_POST['confirm']){
					Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> The new password has not been confirmed correctly.");
					
					$activity = new UserActivity();
					$activity->agent = "student with ID : ".$id;
					$activity->category = 11;
					$activity->theuser = $id;
					$activity->user_cat = 4;
					$activity->details = "Failure Changing Password.The new password has not been confirmed correctly.";
					$activity->date_recorded = time();
					$activity->save();
				}
				else{
				
					$model->password = md5($_POST['confirm']);
					if ($model->save()){
						Yii::app()->user->setFlash('success', "<b>Success Changing Password</b><br/> Your password has been changed successfully.");
						$model->password = md5($_POST['confirm']);
						
						$activity = new UserActivity();
						$activity->agent = "student with ID : ".$id;
						$activity->category = 7;
						$activity->theuser = $id;
						$activity->user_cat = 4;
						$activity->details = "Success Changing Password. Your password has been changed successfully.";
						$activity->date_recorded = time();
						$activity->save();
						
						$this->redirect(array('view'));
					}else Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> Error while creating your new password, report this to the ICT center(email:webmaster@tukenya.ac.ke).");
				}
			
			}
			$this->render('password/change',array( 'model' => $model));	
			
		}
		else{
		
			
			$this->render('password/change',array( 'model' => $model));		
		}
	
	}
	
	public function actionPersonalInfo() {
		
		
		$session=new CHttpSession;
		$session->open();
		$allowed = $session['cvvvvqwrrr'];
		
		if(empty($allowed)){
			
			Yii::app()->user->setFlash('warning','Before viewing personal profile data, you need to complete this process.');
			
			$this->redirect(Yii::app()->createUrl('//portal/profile/answerSecurityQuestion',array('page'=>1)));
		}
		
		 $session['cvvvvqwrrr'] = "";
		$id = Yii::app()->user->id;
		$model = $this->loadModel($id, 'Employee');
		
		
		$emp = Position::model()->findByPk($model->current_designation_id);
		$emp = (isset($emp->name))?$emp->name.', '.$emp->office:'';
		
		$qual = EmployeeQualificationLevel::model()->findByPk($model->highest_qualification_id);
		$qual = (isset($hq->name))?$hq->name:'';
		
		$name = $model->title.' '.$model->firstname.' '.$model->othername.' '.$model->surname;
		
		
		$this->keyWords = $model->firstname.', '.$model->othername.', '.$model->surname;
		$this->description = "Personal Profile for ".$name.", ".$emp.", ".$qual." at the Technical University of Kenya";
		
				
		$activity = new UserActivity();
		$activity->agent = "staff with ID : ".$model->id;
		$activity->category = 8;
		$activity->theuser = $model->id;
		$activity->user_cat = 4;
		$activity->details = "staff viewed own personal profile ";
		$activity->date_recorded = time();
		$activity->save();
		
		$this->pageTitle = strtoupper(' Personal Profile :: '.$name.' :: '.$this->pageTitle);
	
						
		$this->render('employee/personal_info', array(
			'model' => $model,
			'messages'=>'',
			'page'=>1,
			
		));
	}
	public function actionPayslip() {
		
		
		$session=new CHttpSession;
		$session->open();
		$allowed = $session['cvvvvqwrrr'];
		
		if(empty($allowed)){
			
			Yii::app()->user->setFlash('warning','Before viewing your payslip information, kindly complete this process.');
			$this->redirect(Yii::app()->createUrl('//portal/profile/answerSecurityQuestion',array('page'=>2)));
		}
		
		$session['cvvvvqwrrr'] = "";
		$id = Yii::app()->user->id;
		$model = $this->loadModel($id, 'Employee');
		
		
		$emp = Position::model()->findByPk($model->current_designation_id);
		$emp = (isset($emp->name))?$emp->name.', '.$emp->office:'';
		
		$qual = EmployeeQualificationLevel::model()->findByPk($model->highest_qualification_id);
		$qual = (isset($hq->name))?$hq->name:'';
		
		$name = $model->title.' '.$model->firstname.' '.$model->othername.' '.$model->surname;
		$activity = new UserActivity();
		$activity->agent = "staff with ID : ".$model->id;
		$activity->category = 8;
		$activity->theuser = $model->id;
		$activity->user_cat = 4;
		$activity->details = "staff viewed own payslip information ";
		$activity->date_recorded = time();
		$activity->save();
				
		$this->pageTitle = strtoupper(' Payslip Information :: '.$name.' :: '.$this->pageTitle);
	
						
		$this->render('employee/payslip', array(
			'model' => $model,
			'messages'=>'',
			'page'=>1,
			
		));
	}

	public function actionXzy5677(){
		
		$id = Yii::app()->user->id;
		$employee = $this->loadModel($id, 'Employee');
		
		$payslip = $_POST['xzy5677']; 
		
		$activity = new UserActivity();
		$activity->agent = "staff with ID : ".$employee->id;
		$activity->category = 8;
		$activity->theuser = $employee->id;
		$activity->user_cat = 4;
		$activity->details = "staff downloaded own payslip information ";
		$activity->date_recorded = time();
		$activity->save();
		
		$mPDF1 = Yii::app()->ePdf->mpdf('P', 'A4');
							
		$mPDF1->WriteHTML(
			$this->renderPartial(
			
				'employee/payslip_pdf', array(
					'data'=>$payslip,
					
			),true));
		//provide the output	
		
		$mPDF1->Output($employee->pf_number.'.pdf','D');
		exit;
		
	}
	public function actionP9() {
		/*$session=new CHttpSession;
		$session->open();
		$allowed = $session['cvvvvqwrrr'];
		
		if(empty($allowed)){
			
			Yii::app()->user->setFlash('warning','Before ownloading your P9 FORM, kindly complete this process.');
			$this->redirect(Yii::app()->createUrl('//portal/profile/answerSecurityQuestion',array('page'=>3)));
		}
		
		$session['cvvvvqwrrr'] = "";*/
		$id = Yii::app()->user->id;
		$model = $this->loadModel($id, 'Employee');
		$name = $model->names();
		$activity = new UserActivity();
		$activity->agent = "staff with ID : ".$model->id;
		$activity->category = 8;
		$activity->theuser = $model->id;
		$activity->user_cat = 4;
		$activity->details = "staff viewed own p9 information ";
		$activity->date_recorded = time();
		$activity->save();
		$this->pageTitle = ' Download P9 : '.$name.' :: '.$this->pageTitle;						
		$this->render('employee/p9', array(
			'model' => $model,
			'messages'=>'',
			'page'=>1,
			
		));
	}
	public function actionXzy5677G(){
		$id = Yii::app()->user->id;
		$employee = $this->loadModel($id, 'Employee');
		$activity = new UserActivity();
		$activity->agent = "staff with ID : ".$employee->id;
		$activity->category = 8;
		$activity->theuser = $employee->id;
		$activity->user_cat = 4;
		$activity->details = "staff downloaded P9 form ";
		$activity->date_recorded = time();
		$activity->save();
		//ob_end_clean();
		$mPDF1 = Yii::app()->ePdf->mpdf('L', 'A4-L');	
		//$mPDF1->debug = true; 
		$mPDF1->allow_output_buffering = true;	
		$mPDF1->WriteHTML(
			$this->renderPartial(
				'employee/p9_pdf', array(
					'p9'=>$_POST['xzy5677G'],
					
			),true));
		ob_end_clean();
		$mPDF1->Output('P9-'.$employee->pf_number.'.pdf','D');
		exit;
		
	}
	public function getUserMessages(){
	
		//Messages
		$where = "student_id = '".Yii::app()->user->name."' AND status_id=0 AND sender=1";
		
		$user = $this->loadModel(Yii::app()->user->id, 'Student');
		
		$mailbox=new CActiveDataProvider(
			'StudentMail', array(
				'criteria'=>array(
				'condition'=>$where,
				),
				'pagination'=>array(
						'pageSize'=>20,
				),
		));

		$count = $mailbox->totalItemCount;

		if ($count==1) $message = "<h2 class='reply'><a href='index.php?r=portal/profile/mailbox'>Hi,  ".$user->firstname."! You have one new message.</a></h2>";
		else if ($count>1) $message = "<h2 class='reply'><a href='index.php?r=portal/profile/mailbox'>Hi,  ".$user->firstname."! You have ".$count." new messages. </a></h2>";
		else $message = "";
		
		$messages['txt'] = $message;
		$messages['count'] = $count;
		
		return $messages;
			
	}
	///////
	public function actionViewMail($id) {
		
		$this->pageTitle = 'Mail Message - '.$this->pageTitle;
		
		$mail = $this->loadModel($id,'StudentMail');
							
		if ($mail->sender_id === 1)
		{
			
			$mail->status_id = 1;
			$mail->sender = 1;
			$mail->save();
		}
		
		$mail = $this->loadModel($id,'StudentMail');
		
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
		
			$parent = $this->loadModel($mail->parent_id,'StudentMail');
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
		
			$activity = new UserActivity();
			$activity->agent = "student with reg number : ".Yii::app()->user->name;
			$activity->category = 7;
			$activity->theuser = Yii::app()->user->id;
			$activity->user_cat = 2;
			$activity->details = "Viewed own mails";
			$activity->date_recorded = time();
			$activity->save();
						
		
		
		if (empty($id)){
			
			$this->header = "Inbox - Received Items";
			$where = "student_id = '".Yii::app()->user->name."' AND sender = 1 ";
			
		}
		else{
			$this->header = "Sent Items";
			$where = "student_id = '".Yii::app()->user->name."' AND sender <> 1 ";
			
		}
		
		$model=new StudentMail('search');
		
		$mailbox=new CActiveDataProvider('StudentMail', array(
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
		$model=new StudentMail;
		
		if(isset($_POST['StudentMail']))
		{
			
			$support = User::model()->findAll('role_id=:role', array(':role'=>16));//16 is the role for support
			
			//<><><><><><><><>
			$model->attributes=$_POST['StudentMail'];
			$model->sender = 0;//student is the sender
			$model->student_id = Yii::app()->user->name;//student denoted by 0
			$model->status_id =0;//unread
			$model->date_modified = time();
			$model->date_created = time();
			
			
			//<><><>send to all support teams
			$err='';
			for ($i=0;$i<count($support);$i++)
			{
				$mail=new StudentMail;
				$mail->setAttributes($model->getAttributes(),false);
				$mail->support_id = $support[$i]->id;
				if (!$mail->save()) $err .= CHtml::errorSummary($mail);
			}
			
			$user = $this->loadModel(Yii::app()->user->id,'Student');
			
			$activity = new UserActivity();
			$activity->agent = "student with reg number : ".Yii::app()->user->name;
			$activity->category = 7;
			$activity->theuser = Yii::app()->user->id;
			$activity->user_cat = 2;
			$activity->details = "sent mail to support team";
			$activity->date_recorded = time();
			$activity->save();
			
			
			//<><><>redirect student after successful save	
			if (!empty($err)) Yii::app()->user->setFlash('error', '<b>Mail Message</b><br/> Sorry '.$user->surname.' '.$user->firstname.' '.$user->othername.'! The operation failed '.$err);
			else if (count($support)<1)
			Yii::app()->user->setFlash('warning', '<b>Mail Message</b><br/> Sorry '.$user->surname.' '.$user->firstname.' '.$user->othername.'! The student support officer is currently not available. Please try again later.');
			else Yii::app()->user->setFlash('success', '<b>Mail Message</b><br/> '.$user->surname.' '.$user->firstname.' '.$user->othername.'! your mail has been sent successfully. Thank you for contacting us.');
			$this->redirect(array('view'));
				
			
				
		}
		$this->render('mymailbox/create',array(
			'model'=>$model,
		));
	}
	public function actionReply($id)
	{
		$mail=$this->loadModel($id,'StudentMail');
		
		$mails = array();
		$mails[] = $mail;
		$parent_mails = $this->getParent($mails, $mail);
		
		$model=new StudentMail;
		
		
		
		if(isset($_POST['StudentMail']))
		{
			$model->attributes=$_POST['StudentMail'];
			$model->sender = 0;
				
			if (!$model->save()) {echo CHtml::errorSummary($model); exit;}
							
			else{
			
				Yii::app()->user->setFlash('success','Message sent!');
				
				$activity = new UserActivity();
				$activity->agent = "student with reg number : ".Yii::app()->user->name;
				$activity->category = 7;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 2;
				$activity->details = "replied mail to support team";
				$activity->date_recorded = time();
				$activity->save();
								
				$this->redirect(array('//portal/profile/view'));
				
				
			}	
		}
		$this->render('mymailbox/reply/update',array(
			'model'=>$model,
			'mail'=>$mail,
			'parent_mails'=>$parent_mails,
		));

		
	}
	public function actionList()
	{
				
			$this->pageTitle = "List of Staff Members in the Technical University of Kenya";
			$this->keyWords = "staff members, staff list, academic staff";
			$this->description = "This page shows a list of staff members  at the Technical University of Kenya. You will find both academic and administration staff members.";
	
			$total = Employee::model()->count();
			$ids = array();
			for ($i = 1; $i<=$total; $i++) 
			{
			    $ids[] = $i;
			}
			
			shuffle($ids);
		
			$this->render('employee/search_results',array('ids'=>$ids));
		
		
	}
	public function actionList1()
	{
			
			$this->pageTitle = "List of Staff Members in the Technical University of Kenya";
			$this->keyWords = "staff members, staff list, academic staff";
			$this->description = "This page shows a list of staff members  at the Technical University of Kenya. You will find both academic and administration staff members.";
			
			$criteria=new CDbCriteria;
			$criteria->condition = 'category_id=1';
			$criteria->order='title_id DESC';
			$academic = Employee::model()->findAll($criteria);
			
			$criteria=new CDbCriteria;
			$criteria->condition = 'category_id=2';
			$criteria->order='title_id DESC';
			$admin = Employee::model()->findAll($criteria);
			
			
			
			$this->render('employee/search_results',array('academic'=>$academic,'admin'=>$admin));
		
		
	}
	public function actionSecurityQuestion() {
		
		$model = $this->loadModel(Yii::app()->user->id, 'Employee');
		
		$this->pageTitle = 'Set Secuirty Question - '.$this->pageTitle;
		
		
		
			//try to restore student admission form values with applicant data - incase of error
		if ((isset($_POST['new'])&& (isset($_POST['confirm']))&& (isset($_POST['Employee'])))){
			
						
			$user =  $this->loadModel(Yii::app()->user->id, 'Employee');
			
			//first change of password
			if ($_POST['new']!==$_POST['confirm']){
					Yii::app()->user->setFlash('error', "<b>Failure Setting Password Recovery Option</b><br/> The answers seem to be  different. Please type the same answers.");
				}
			else{
					$user->security_answer = md5($_POST['confirm']);
					
					$p=$_POST['Employee'];  $user->security_question_id = $p['security_question_id'];
					
					if ($user->save()) {
						Yii::app()->user->setFlash('success', "<b>Security Question</b><br/> This is set successfully!.");
						
							$activity = new UserActivity();
							$activity->agent = "staff with ID : ".$model->id;
							$activity->category = 8;
							$activity->theuser = $model->id;
							$activity->user_cat = 4;
							$activity->details = "successfully set password recovery option for";
							$activity->date_recorded = time();
							$activity->save();
						
		
						$this->redirect(Yii::app()->createUrl('//portal/profile/payslip'));
					}
					else Yii::app()->user->setFlash('error', "<b>Failure Setting Password Recovery Option</b><br/> Error while creating your new password, report this to the ICT center(email:webmaster@tukenya.ac.ke).");
					
				}
						
		}
		$this->render('password/security_question',array( 'model' => $model));	
	}

	public function actionAnswerSecurityQuestion($page) {
		
		$user = $this->loadModel(Yii::app()->user->id, 'Employee');
		//set security question
		if ($user->security_question_id==0){
				
			Yii::app()->user->setFlash('warning','Sorry, you need to setup your security question first');
			$this->redirect(Yii::app()->createUrl('//portal/profile/securityQuestion'));
		}
		
		$model = $this->loadModel(Yii::app()->user->id, 'Employee');
		
		$this->pageTitle = 'Second level Authorization - '.$this->pageTitle;
		
					
		if (isset($_POST['Employee'])){
			
			$p = $_POST['Employee'];
			
			if(isset($p['security_answer'])){
							
							$answer = $p['security_answer'];
							if($model->security_answer==md5($answer)){
									
								$session=new CHttpSession;
								$session->open();
								$session['cvvvvqwrrr'] = $user->id;
								
								if ($_POST['page']==1) 	$this->redirect(Yii::app()->createUrl('//portal/profile/personalInfo'));
								else $this->redirect(Yii::app()->createUrl('//portal/profile/payslip'));
							}
							else{
								
								Yii::app()->user->setFlash('error','Access denied. Please provide the correct answer.');
								$activity = new UserActivity();
								$activity->agent = "user : username ".$model->pf_number." - ".CHttpRequest::getUserHostAddress();
								$activity->category = 11;
								$activity->details = "wrong answer for security question ".CHttpRequest::getUserHostAddress();
								$activity->date_recorded = time();
								$activity->save();
								$this->redirect(Yii::app()->createUrl('//portal/profile/answerSecurityQuestion',array('page'=>$_POST['page'])));
							}
						}
						
		}
		$this->render('password/answer_security_question',array( 'model' => $model, 'page'=>$page));	
	}
	public function actionSecurePassword() {
			
		$session=new CHttpSession;
		$session->open();
		$id = $session['cvvvvqwrrr'];
		
		$model = Employee::model()->findByPk($id);
		
		if((empty($model->id)) || (!isset($session['cvvvvqwrrr']))){
			
			Yii::app()->user->setFlash('error','Trying to access Forbidden Page. Kindly contact the administrator for further assistant.');
			$this->redirect(Yii::app()->createUrl('//site/login'));
		}
		
		
		$this->pageTitle = 'Reset Your Password  - '.$this->pageTitle;
		
		
		
			//try to restore student admission form values with applicant data - incase of error
		if ((isset($_POST['new'])&& (isset($_POST['confirm'])))){
			
	
			$user = Employee::model()->findByPk($id);
			
			//first change of password
			if ($_POST['new']!==$_POST['confirm']){
					Yii::app()->user->setFlash('error', "<b>Failure Resetting Password</b><br/> The new password has not been confirmed correctly.");
				}
			else{
					$user->password = md5($_POST['confirm']);
					if ($user->save()) {
						
						Yii::app()->user->setFlash('success', "<b>Success Resetting Password</b><br/> Your login password has been reset successfully.");
						$activity = new UserActivity();
						$activity->agent = "user : username ".$user->pf_number." - ".CHttpRequest::getUserHostAddress();
						$activity->category = 11;
						$activity->details = "password reset successfully ".CHttpRequest::getUserHostAddress();
						$activity->date_recorded = time();
						$activity->save();
						$session=new CHttpSession;
						$session->open();
						$session['attempts'] = 3; 
						$this->redirect(Yii::app()->createUrl('//site/login'));
		
					}
					else Yii::app()->user->setFlash('error', "<b>Failure Changing Password</b><br/> Error while creating your new password, report this to the ICT center(email:webmaster@tukenya.ac.ke).");
					
				}
						
		}
		$this->render('account/reset',array( 'model' => $model));	
			
		
	
	}
	public function updateHighestQualifications($pf_number){
		
		//update highest qulaifications
		$staff = Employee::model()->find('lower(pf_number)=?',array(strtolower($pf_number)));
		$criteria = new CDbCriteria;
		$criteria->with = array('level');
		$criteria->condition  = "t.pf_number='".$pf_number."' AND year != 'On-going' ";
		$criteria->order='level.weight ASC';
		$qual 	= EmployeeQualification::model()->findAll($criteria);
		$staff->highest_qualification_id = (isset( $qual[0]->id))?$qual[0]->level_id:0;
		$staff->save();
	}
	
	public function updateCurrentDesignation($pf_number){
		
		$staff = Employee::model()->find('lower(pf_number)=?',array(strtolower($pf_number)));
		$criteria = new CDbCriteria;
		$criteria->condition  = "t.pf_number='".$pf_number."'";
		$criteria->order='d_start DESC';
		$employment = EmployeeEmployment::model()->findAll($criteria);
		$staff->current_designation_id = (isset( $employment[0]->id))?$employment[0]->position_id:0;
		$staff->current_employment_id = (isset( $employment[0]->id))?$employment[0]->id:0;
		$staff->save();
	}
	
	public function updateProfileDocument($id=''){
		
		if(empty($id)) $id = Yii::app()->user->id;
		$model = $this->loadModel($id, 'Employee');	
		if (isset($model->id)){
			
			$mPDF1 = Yii::app()->ePdf->mpdf('P', 'A4');
			$mPDF1->WriteHTML(
				///<><><>
				$this->renderPartial('employee/full_view_pdf', array(
						'model'=>$model,
						'user'=>$model->surname,
				)
				,true));
			//provide the output	
			$link = Yii::app()->linkManager->staffPublicFolder().'/profiles/'.trim($model->title).'-'.strtoupper(trim($model->firstname).'-'.trim($model->othername).'-'.trim($model->surname)).'.pdf';
			$model->profile_link = $link;
			$model->save();
			$mPDF1->Output($link,'F');
			echo "Generated PDF for Staff number ".$id."<br/>";
			
		}			
		
		else echo "Staff number ".$id." not found<br/>";
		
	}
	
	public function actionUpdatePDFs($start,$end){
		
		$profiles =  Employee::model()->findAll('id>='.$start.' and id <='.$end);	
		for($i=0;$i<count($profiles);$i++){
			
			$this->updateProfileDocument($profiles[$i]->id);
		}
		
		echo "Update Successful!";
	}
	
	public function actionUpdateStaffProfiles($start,$end){
		
		$profiles =  Employee::model()->findAll('id>='.$start.' and id <='.$end);	
		for($i=0;$i<count($profiles);$i++){
			
			$this->updateHighestQualifications($profiles[$i]->pf_number);
			$this->updateCurrentDesignation($profiles[$i]->pf_number);
			
		}
		
		echo "Update Successful!";
	}
	public function actionPhoto() {	
		$this->pageTitle = 'Upload new profile photo '.$this->pageTitle;
		$model = $this->loadModel(Yii::app()->user->id, 'Employee');
		if (isset($_POST['Employee'])) {
			$model->setAttributes($_POST['Employee']);			
			if ($model->uploadPhoto()) $this->redirect(array('view'));
		}
		$this->render('account/passport', array('model' => $model,));
	}
	
}