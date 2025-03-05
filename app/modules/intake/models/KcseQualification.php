<?php

Yii::import('application.modules.intake.models._base.BaseKcseQualification');

class KcseQualification extends BaseKcseQualification
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
