<?php

Yii::import('application.modules.hr.models._base.BaseStaff');

class Staff extends BaseStaff
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
	public function behaviors()
	{
		return array(
			'LoggableBehavior'=>
				'application.modules.auditTrail.behaviors.LoggableBehavior',
		);
	}
}
