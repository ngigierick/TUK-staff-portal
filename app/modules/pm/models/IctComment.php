<?php

Yii::import('application.modules.pm.models._base.BaseIctComment');

class IctComment extends BaseIctComment
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
