<?php

Yii::import('application.modules.portal.models._base.BaseStudentAspirant');

class StudentAspirant extends BaseStudentAspirant
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
			if (isset($temp)){
				
				$oldPassport = Yii::app()->basePath.'/../images/passports/'.$temp;
				
				
						
				if (file_exists($oldPassport)) {
					
					if (isset($_POST['photo'])) unlink($oldPassport);
				}
			}
			
			
			
			
        }
		else{
			if (isset($_POST['photo'])) $this->photo = $_POST['photo'];
		}
		
		
		return parent::beforeSave();
    }
}
