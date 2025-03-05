<?php

Yii::import('application.modules.user.models._base.BaseUser');
Yii::import('application.modules.hr.models.Office');
class User extends BaseUser
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	//ensure all models save modification timestamp
	public function beforeSave()
    {
		$this->date_modified=time();
		
		if (isset($_POST['photo'])) $temp = $_POST['photo'];
		//save passport photo
		if($file=CUploadedFile::getInstance($this,'photo'))
        {
			//capture photo name
			$rnd = rand(0,9999);
			$fileName = "{$rnd}_{$file}";  
			$this->photo = $fileName;
			//upload photo
			$file->saveAs(Yii::app()->basePath.'/../images/users/'.$this->photo); 
			//delete original photo
			if (isset($_POST['photo'])) unlink(Yii::app()->basePath.'/../images/users/'.$temp);
			
        }
		else{
			if (isset($_POST['photo'])) $this->photo = $_POST['photo'];
		}
		
		return parent::beforeSave();
    }
	public function fullName(){
		return $this->name;
	}
	//log the audit trail
	public function behaviors()
	{
		
		return array(
			'LoggableBehavior'=>
				'application.modules.auditTrail.behaviors.LoggableBehavior',
		);
	}
		
	public function validatePassword($password)
	{
		return $this->hashPassword($password)===$this->password;
	}
	public function hashPassword($password)
	{
		//return md5($password);
		return $password;
	}
	public function checkIPLogin()
	{
		if(!$this->ip_login) return true;
		return (Yii::app()->getRequest()->getUserHostAddress() == $this->ip_address);
	}
	public static function formatFigure($f, $t='')
	{
		$str = "<span class='num'>".number_format($f, 0, '.', ', ')."</span>";
		if (!empty($t)){
			
			$p = ($f/$t)*100;
			$str = "  <span class='percentage'> ".number_format($p, 0, '.', ', ')."%  </span>";
		} 
		
		return $str;
	}
	public static function userRoles($id)
	{
		$s = '';
		$user=User::model()->findByPk($id);
		$s .= '<tr><td>'.$user->role.'</td><td><span class="icon-ok"> &nbsp;</span> &nbsp;<span class="read">Active</span></td></tr>';
		//display secondary roles
		foreach($user->roles as $relatedModel){
			$ss = $relatedModel->updateStatus();
			$r = $relatedModel->role;
			$st = $relatedModel->status;
			$up ='';
			if ($st<2) $up = " | ".GxHtml::link("<i class='icon-edit'> </>", array('//user/user/assignUpdate', 'id' => $id, 'i'=>$relatedModel->id));
			$s .= '<tr><td>'.$r.'</td><td>'.$ss.$up.'</td></tr>';
		}
		
		$str='<table width="100%">
		<tr><th colspan="2"><b>USER ROLES</b></th></tr>
		<tr><th>ROLE</th><th>STATUS</th></tr>
		'.$s.'</table>';
		return $str;
	}
	public static function canEmulateOthers()
	{
		$s = false;
		$user=User::model()->findByPk(Yii::app()->user->id);
		foreach($user->roles as $relatedModel){
			$relatedModel->updateStatus();
			if ($relatedModel->status==1) return true;
		}
		return false;
		
	}
	public static function emulating()
	{
		$session=new CHttpSession;
		$session->open();
		return (!empty($session['emulating']));
		
	}
	public static function emulableRoles()
	{
		$s = '';
		$user=User::model()->findByPk(Yii::app()->user->id);
		$s .= '<tr><td>'.$user->role.'</td><td><span class="icon-ok"> &nbsp;</span> &nbsp;<span class="read">Active</span></td></tr>';
		//display secondary roles
		foreach($user->roles as $relatedModel){
			$ss = $relatedModel->updateStatus();
			$r = $relatedModel->role;
			$st = $relatedModel->status;
			$up ='';
			if ($st==1) $up = " | ".GxHtml::link("Swith to ".$r."</span>", array('//user/role/emulate', 'id'=>$relatedModel->role_id));
			$s .= '<tr><td>'.$r.'</td><td>'.$ss.$up.'</td></tr>';
		}
		$str='<table width="100%">
		<tr><th colspan="2"><b>USER ROLES</b></th></tr>
		<tr><th>ROLE</th><th>STATUS</th></tr>
		'.$s.'</table>';
		
		return $str;
		
	}
	public static function lockUser($id)
	{
		$user=User::model()->findByPk($id);
		if (isset($user->id)){
			$user->status = 0;
			$user->save(); 
		}
	}
	public static function accountLockMessage(){
		$attempts = "<span class='unread'>We are sorry. Your account has been blocked. Kindly contact the System Administrator for further assistance</span>";
		return  "<span class='olive'>Authentication failed. ".$attempts."</span><hr /><br />".
		CHtml::link( '<span class="btn btn-warning"><span class="icon-flag"> </span> &nbsp;Get help</span>', array('initiate/help'));
	}
	public static function wrongMachineMessage(){
		$msg = "<span class='unread'>It seems you are using someone's machine or your machine settings have recently changed. Kindly contact the Administrator for further assistance.</span>";
		return  $msg."</span><hr /><br />".
		CHtml::link( '<span class="btn btn-warning"><span class="icon-flag"> </span> &nbsp;Get help</span>', array('initiate/help'));
	}
	public static function attemptsEhaustedMessage(){
		$attempts = "<span class='unread'>We are sorry. You have exhausted your attempts.</span>";
		return  "<span class='unread'>Authentication failed. ".$attempts."</span><hr /><br />".
		CHtml::link( '<span class="btn btn-warning"><span class="icon-flag"> </span> &nbsp;Get help</span>', array('initiate/help'));
	}
	public static function wrongPasswordMessage($attempts){
		if ($attempts==1) $attempts = "<span class='unread'>Remember you have ONLY 1 attempt remaining, after which your will be blocked.</span>";
		else $attempts = "<span class='olive'>You have  ".$attempts." attempts remaining.</span>";
		return  "<span class='olive'>Authentication failed. ".$attempts."</span><hr /><br />".
		CHtml::link( '<span class="btn btn-success"><span class="icon-user"> </span> &nbsp;Kindly try again</span>', array('initiate/startOperation'))."&nbsp;&nbsp;&nbsp;".
		CHtml::link( '<span class="btn btn-warning"><span class="icon-lock"> </span> &nbsp;Recover password</span>', array('initiate/recoverPassword'))."&nbsp;&nbsp;&nbsp;".
		CHtml::link( '<span class="btn btn-info"><span class="icon-flag"> </span> &nbsp;Get system help.</span>', array('initiate/help'));
	}
	public static function adminMessage(){
		return "<span class='unread'>Problem encountered. Kindly contact the administrator for more help.</span><hr />";
	}
	public static function logoutOfSystem(){
		if (isset(Yii::app()->user->name)) $name = Yii::app()->user->name;
		else $name = "Unknown user";
		$details = $name.' logged out of system';
		UserActivity::record('logout',$details);
		$session=new CHttpSession;
		$session->open();
		$id =  $session['log'];
		if (isset($session['log'])){
			$log=Log::model()->findByPk($id);
			$log->logout=time();
			$log->save();
		}
		Yii::app()->user->logout();
	}
	public static function restoreRole(){
		$previous = Role::model()->findByPk(Yii::app()->user->getState("role"));
		Yii::app()->user->setState("em",'');
		Yii::app()->user->setState("role",User::role());
		$user = User::model()->findByPk(Yii::app()->user->id);
		$details = "Reverted user role back to ".$user->role->name." from ".$previous->name." ID ".$previous->id;
		UserActivity::record('login_success',$details);
		return "<b>Reverting User Role Successful!</b><br/> You are now back operating as ".$user->role->name." from ".$previous->name;
	}
	//return user role
	public static function role(){
		$r = Yii::app()->user->getState("role");
		if (!empty($r)) return $r;
		$user=User::model()->findByPk(Yii::app()->user->id);
		if (isset($user->id)) return $user->role_id; else return 0;
	}
	//return user ID
	public static function userId(){
		$user=User::model()->findByPk(Yii::app()->user->id);
		if (isset($user->id)) return $user->id; else return 0;
	}
	
	public static function canResetStaffPassword(){
		if (User::isDataManager()) return true;
		if (User::isDataEntryClerk()) return true;
		if ((User::userID()==311)||(User::userID()==50)||(User::userID()==8)||(User::userID()==1))
			return true;
	}
	public static function canViewStudent(){
		$r = Yii::app()->user->getState("role");
		return (($r==1)||($r==10)||($r==4)||($r==6)||($r==22)||($r==18));
	}
	//
	public static function isDataManager(){
		$r = Yii::app()->user->getState("role");
		return (($r==37)||($r==38));
		
	}
	public static function isSchoolHead(){
		$r = Yii::app()->user->getState("role");
		return ($r==8);
		
	}
	public static function isDataEntryClerk(){
		$r = Yii::app()->user->getState("role");
		return ($r==37);
		
	}
	public static function isTopManagement(){
		$r = Yii::app()->user->getState("role");
		return ($r==10);
	}
	
	public static function isRecordOfficer(){
		$r = Yii::app()->user->getState("role");
		return ($r==43);
		
	}
	public static function isChiefCashier(){
		$r = Yii::app()->user->getState("role");
		return ($r==5);
	}
	public static function isCashier(){
		$r = Yii::app()->user->getState("role");
		return ($r==44);
	}
	public static function departmentalExam(){
		$r = Yii::app()->user->getState("role");
		return ( ($r==11) || ($r==30) );
	}
	public static function isHoD(){
		$r = Yii::app()->user->getState("role");
		return ($r==11);
	}
	public static function isRegistrarAcademics(){
		$r = Yii::app()->user->getState("role");
		return ($r==6);
	}
	public static function isAdmission(){
		$r = Yii::app()->user->getState("role");
		return ($r==4);
	}
	public static function isPostgraduateDirector(){
		$r = Yii::app()->user->getState("role");
		return ($r==46);
	}
	public static function isNurse(){
		$r = Yii::app()->user->getState("role");
		return ($r==39);
	}
	public static function isPharmacist(){
		$r = Yii::app()->user->getState("role");
		return ($r==40);
	}
	public static function isDoctor(){
		$r = Yii::app()->user->getState("role");
		return ($r==41);
	}
	public static function isLabTech(){
		$r = Yii::app()->user->getState("role");
		return ($r==42);
	}
	//user profile
	public static function profile(){
		return User::model()->findByPk(Yii::app()->user->id);
	}
	public static function PollingStation(){
		return strtoupper(User::profile()->pollingStation);
	}
	public static function PollingStationId(){
		return User::profile()->polling_station_id;
	}
	public static function departmentId(){
		return User::profile()->department_id;
	}
	public static function office(){
		return Office::model()->findByPk(User::profile()->office_id);
	}
	public static function number($n){
		return number_format($n, 0, '.', ', ');
	}
	public static function money($n){
		return number_format($n, 2, '.', ', ');
	}
	public static function fromVCOffice(){
		return (User::profile()->office_id == Office::VCOffice());
	}
	public static function messages(){
		$data['count'] ='';
		$where = "to_id = '".Yii::app()->user->id."' and status_id=0";
		$mailbox=new CActiveDataProvider('Mailbox', array(
													'criteria'=>array(
														'condition'=>$where,
													),
													'pagination'=>array(
													'pageSize'=>20,
							),
		));

		$count = $mailbox->totalItemCount;
		if ($count==1) $message = "<span class='popup'><a href='index.php?r=user/user/mailbox'>1 new message.</a></span>";
		else if ($count==2) $message = "<span class='popup'><a href='index.php?r=user/user/mailbox'>".$count." new messages. </a></span>";
		else $message='';
		if ($count>0) $data['count'] = "(".$count.")";
		$data['messages'] = $message;
		return $data;
	}
	public static function officeDisplay(){
		return;
	}
	public function welcomeMessage(){
		return "Dear ".$this->name.",<br /><br />
		Welcome to TuSOFT Management Information System. The system allows you to perform the University operations conveniently and securely.<br /> 
		You have been give a role of ".$this->role.". <br />
		Your username is ".$this->username."<br />
		Your password is secured as you had entered. Please keep it safe.<br />
		In case of any problem, kindly contact the Directorate of ICT Services.<br />
		";
	}
	public function passwordChangeMessage(){
		return "Dear ".$this->name.",<br /><br />
		This is to inform you that your password was reset.<br /> 
		In case you did not request for this service, quickly contact the Directorate of ICT Services.<br />
		";
	}
	public function infoChangeMessage(){
		return "Dear ".$this->name.",<br /><br />
		This is to inform you that some of your profile details have been updated.<br /> 
		In case of any problem, kindly contact the Directorate of ICT Services.<br />
		";
	}
	
	public function sentChangeNotification($subject,$message){
		EmailNotification::record($subject,User::userId(),Yii::app()->utility->category,0,$this->email,$subject,$message);
	}
	public static function userCategory($user){
		if (strtolower($user) == 'applicant') return 4;
		if (strtolower($user) == 'staff') return 3;
		if (strtolower($user) == 'student') return 2;
		if (strtolower($user) == 'user') return 1;
	}
	public static function userCategoryName($user){
		if ($user == 4) return 'Applicant';
		if ($user == 3) return 'Employee';
		if ($user == 2) return 'Student';
		if ($user == 1) return 'User';
	}

}
