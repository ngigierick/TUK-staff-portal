<?php

Yii::import('application.modules.selection.models._base.BaseAccepted');

class Accepted extends BaseAccepted
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
	
	public function beforeFind() {
	
		return true; //don't forget this
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
