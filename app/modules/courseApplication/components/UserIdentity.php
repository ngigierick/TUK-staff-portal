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
		
			//validate student login
			Yii::import('application.modules.intake.models.PreApplicant');
			$st=PreApplicant::model()->find('LOWER(email)=?',array(strtolower($this->username)));
			if($st===null)
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			else if(!$st->validatePassword($this->password))
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else
			{
				$this->_id=$st->id;
				$this->username=$st->email;
				$this->setState('role', 999);
				Yii::app()->user->id = $st->id;
				$this->errorCode=self::ERROR_NONE;
				
				//log activity
				$log = new Log();
				$log->user_id = Yii::app()->user->id;
				$log->category_id = 3;//applicant
				$log->login = time();
				$log->save();
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
