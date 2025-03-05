<?php
Yii::import('application.modules.user.models._base.BaseUserActivity');

class UserActivity extends BaseUserActivity
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	function recordSiteError($event)
    {
		$error=Yii::app()->errorHandler->error;
		$details = " encountered error :message".$error['message'];
		UserActivity::record('page_error', $details);
    }
	public static function record( $category, $details,$action=1)
	{
		$activity = new UserActivity();
		$user = Employee::model()->findByPk(UserActivity::applicantID());
		if (isset($user->id)){
			$activity->agent = "staff : ".$user->pf_number." - ".$user->firstname." ".$user->surname." user ID ".$user->id."- ".Yii::app()->getRequest()->getUserHostAddress();
			$activity->theuser = $user->id;
		}		
		else{
			$activity->agent = "staff : unknown - ".Yii::app()->getRequest()->getUserHostAddress();
			$activity->theuser = -1;
		}
		$activity->category = $activity->getCategory($category);
		$activity->user_cat = Yii::app()->utility->category;
		$activity->details = $details;
		$activity->date_recorded = time();
		$activity->action_category = $action;
		if (!$activity->save()) UserActivity::recordSavingError($activity);
		
	}
	function getCategory( $name )
	{
		$category = -1;
		
		switch($name){
			case "add": 				$category 	= 1;
			case "edit": 				$category	= 2;
			case "view": 				$category 	= 3;
			case "delete": 				$category 	= 4;
			case "login_success": 		$category 	= 5;
			case "login_error": 		$category 	= 6;
			case "validation_error": 	$category 	= 7;
			case "role_error": 			$category 	= 8;
			case "page_error": 			$category 	= 9;
			case "logout": 				$category 	= 10;
		}
		return $category;
	}	
	public static function recordSavingError($model)
	{
		echo CHtml::errorSummary($model); exit;
		
	}
	//record user access information
	public static function recordUserAccess(){
		
		$host = Yii::app()->getRequest()->getUserHostAddress();
		$session['host'] = $host;
		$allowed = Host::model()->find('LOWER(ip)=?',array(strtolower($host)));
		$user = User::model()->find('LOWER(ip_address)=?',array(strtolower($host)));
		if($user===null) $name = 'Annonymous';
		else $name = $user->name;
		//capture login IPs
		$access = new Access();
		$access->name = $name;
		$access->ip_address = $host;
		$access->save();
	}
	//display login page
	public static function loginPage($attempts,$controller){
		$model=new LoginForm;
		$controller->render('login',array('model'=>$model, 'attempts'=>$attempts));
	}
	//set up user login
	public static function retrieveUserDetailsAndSetLogin($POST){
		$model=new LoginForm;
		$model->username	= $POST['username'];
		$model->password	= md5($POST['password']);
		$data['model'] 		= $model;
		$data['user'] 		= User::model()->find('lower(username)=?',array(strtolower($POST['username'])));
		return $data;
	}

	public static function displayLatest($n=10){
		
		$criteria				=	new CDbCriteria;
		$criteria->condition 	= 	'theuser='.User::userId();
		$criteria->limit 		= 	$n;
		$criteria->order 		= 	'id DESC';
		return UserActivity::model()->findAll($criteria);
	}
	//super admin
	public static function isSuperAdmin(){
		
		return (User::userId()==1);
	}
	public static function activities($t,$u){
	
			$a = UserActivity::model()->findAll('theuser='.$u);
			$str='';
			for($j=0;$j<count($a);$j++){
		
					if(date('d/m/Y',$a[$j]->date_recorded) == $t) $str .= date('g:i A',$a[$j]->date_recorded)." | ".$a[$j]->details."<br/>";
			}	
	
			return $str;
	}
	public static function applicantID()
	{
	
		return Yii::app()->user->id;
		
	}
	
	
}
