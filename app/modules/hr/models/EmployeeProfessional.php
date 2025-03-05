<?php

Yii::import('application.modules.hr.models._base.BaseEmployeeProfessional');

class EmployeeProfessional extends BaseEmployeeProfessional
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
	//log the audit trail
	
}
