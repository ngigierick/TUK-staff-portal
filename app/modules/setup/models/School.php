<?php

Yii::import('application.modules.setup.models._base.BaseSchool');

class School extends BaseSchool
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
