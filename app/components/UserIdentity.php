<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
 
class UserIdentity extends CUserIdentity
{
	private $_id;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		
			//validate staff login
			Yii::import('application.modules.hr.models.Employee');
			$st=Employee::model()->find('LOWER(pf_number)=? AND status!=7',array(strtolower($this->username)));
			if($st===null){
				
				//wrong username
				$activity = new UserActivity();
				$activity->agent = "username : ".$this->username;
				$activity->category = 1;
				$activity->theuser = 0;
				$activity->user_cat = 3;
				$activity->details = "staff entered wrong pf number : ".$this->username.", from ".Yii::app()->getRequest()->getUserHostAddress();
				$activity->date_recorded = time();
				$activity->save();
				
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}
			else if (!$st->validatePassword($this->password)){
								
				//wrong password
				$activity = new UserActivity();
				$activity->agent = "username : ".$this->username;
				$activity->category = 2;
				$activity->theuser = 0;
				$activity->user_cat = 3;
				$activity->details = "staff entered wrong password from ".Yii::app()->getRequest()->getUserHostAddress();
				$activity->date_recorded = time();
				$activity->save();
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
			
			else
			{
				$this->_id=$st->id;
				$this->username=$st->pf_number;
				$this->setState('role', 9999);
				Yii::app()->user->id = $st->id;
				
				
					
				//correct login
				$activity = new UserActivity();
				$activity->agent = "staff : pf number".$st->pf_number." user ID ".$st->id;
				$activity->category = 3;
				$activity->theuser = $st->id;
				$activity->user_cat = 3;
				$activity->details = "staff logged in successfully  from ".Yii::app()->getRequest()->getUserHostAddress();
				$activity->date_recorded = time();
				$activity->save();
				
			
					//log activity
				$log = new Log();
				$log->user_id = Yii::app()->user->id;
				$log->category_id = 3;//staff
				$log->login = time();
				$log->save();
				
				$this->errorCode=self::ERROR_NONE;
				
			}
			return $this->errorCode==self::ERROR_NONE;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}
