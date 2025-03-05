<?php

Yii::import('application.modules.portal.models._base.BaseStudentAspirantAgent');

class StudentAspirantAgent extends BaseStudentAspirantAgent
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
	
}
