<?php

Yii::import('application.modules.intake.models._base.BaseApplicant');

class Applicant extends BaseApplicant
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
			//if (isset($_POST['photo'])) unlink(Yii::app()->basePath.'/../images/passports/'.$temp);
			
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
	
	public function rules() {
		return array(
			array('module_id, title_id, id_number, surname, firstname, programme_id, academicyear_id, dob, gender_id, marital_status_id, nationality_id, county_id,  religion_id, mobile, disability_id, status', 'required'),
			array('title_id, academicyear_id, gender_id, marital_status_id, nationality_id, county_id, ethnicity_id, religion_id, disability_id, status', 'numerical', 'integerOnly'=>true),
			array('id_number, town, mobile', 'length', 'max'=>20),
			//array('photo', 'file', 'types'=>'jpg, gif, png'),
			array('surname, firstname, othername, programme_id, dob, email, occupation, employer_telephone, photo, date_modified', 'length', 'max'=>30),
			array('postal_address, employer_address, employer_otherinfo, extra_info', 'length', 'max'=>200),
			array('postcode', 'length', 'max'=>100),
			array('employer', 'length', 'max'=>100),
			//array('othername, occupation, employer, employer_address, employer_telephone, employer_otherinfo, extra_info, photo, date_modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, title_id, id_number, surname, firstname, othername, programme_id, academicyear_id, dob, gender_id, marital_status_id, nationality_id, county_id, ethnicity_id, religion_id, postal_address, postcode, town, mobile, email, disability_id, occupation, employer, employer_address, employer_telephone, employer_otherinfo, extra_info, photo, status, date_modified', 'safe', 'on'=>'search'),
		);
	}
}
