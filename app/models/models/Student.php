<?php

Yii::import('application.modules.admission.models._base.BaseStudent');

class Student extends BaseStudent
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	//ensure all models save modification timestamp
	public function beforeSave()
    {
		$this->date_modified=time();
		if (isset($_POST['photo'])) $temp = $_POST['photo'];
		//save passport photo
		if($file=CUploadedFile::getInstance($this,'photo'))
        {
			//capture photo name
			$rnd = rand(0,9999);
			$fileName = "{$rnd}_{$file}";  
			$this->photo = $fileName;
			//upload photo
			$file->saveAs(Yii::app()->basePath.'/../images/passports/'.$this->photo); 
			//delete original photo
			if (isset($_POST['photo'])) unlink(Yii::app()->basePath.'/../images/passports/'.$temp);
			
        }
		else{
			if (isset($_POST['photo'])) $this->photo = $_POST['photo'];
		}
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
	
	public function afterFind()
	{
		//$this->status = $this->thestatus;
		//return parent::afterFind();
	
	}
	
	//validate passoword for students
	public function validatePassword($password)
	{
		return $password===$this->id_number;
	}
}
