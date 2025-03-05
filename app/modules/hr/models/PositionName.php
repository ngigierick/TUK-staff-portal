<?php

Yii::import('application.modules.hr.models._base.BasePositionName');

class PositionName extends BasePositionName
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	//ensure all models save modification timestamp
	public function beforeSave()
    {
		//$this->date_modified=time();
		return parent::beforeSave();
    }
	
}
