<?php

Yii::import('application.modules.setup.models._base.BasePreviousStudentDebit');

class PreviousStudentDebit extends BasePreviousStudentDebit
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	//ensure all models save modification timestamp
	public function beforeSave()
    {
		$this->date_=time();
		return parent::beforeSave();
    }
}
