<?php

Yii::import('application.modules.hr.models._base.BaseEmployeeDoc');

class EmployeeDoc extends BaseEmployeeDoc
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
	public function uploadDocument(){
		if (isset($_POST['file_name'])) $temp = $_POST['file_name'];
		if($file=CUploadedFile::getInstance($this,'file_name'))
        {
			$photoName = $file;
			$path = Yii::app()->linkManager->staffPrivateFolder().'/uploads/';
			$oldPassport = $path.$photoName;
			if (file_exists($oldPassport)) unlink($oldPassport);
			if ($file->saveAs($path.$photoName)){
				UserActivity::record("edit","Uploaded own document",8);
				Yii::app()->user->setFlash('success', 'Document uploaded successfully.');
				$this->file_name = $photoName;
				$this->save();
				return true;
			}
			else{
				Yii::app()->user->setFlash('error', 'Error encountered while uploading file, please try again.'); 
				return false;
			}
			
		}
	}
	//log the audit trail
	
}
