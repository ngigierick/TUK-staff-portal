<?php

Yii::import('application.modules.hr.models._base.BaseEmployeeStatement');

class EmployeeStatement extends BaseEmployeeStatement
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
