<?php

Yii::import('application.modules.intake.models._base.BasePreApplicant');

class PreApplicant extends BasePreApplicant
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	//ensure all models save modification timestamp
	public function beforeSave()
    {
		$this->date_modified=time();
		return parent::beforeSave();
    }
	
	//validate passoword for students
	public function validatePassword($password)
	{
		return md5($password)===$this->passowrd;
		
	}
	
}
