<?php

Yii::import('application.modules.finance.models._base.BaseFeePayable');

class FeePayable extends BaseFeePayable
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
	
	public function rules() {
		return array(
			array('name,  paid', 'required'),
			array('paid', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('notes', 'length', 'max'=>200),
			array('name, notes, paid', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, notes, paid', 'safe', 'on'=>'search'),
		);
	}
}
