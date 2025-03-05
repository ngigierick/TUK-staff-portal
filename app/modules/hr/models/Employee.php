<?php

Yii::import('application.modules.hr.models._base.BaseEmployee');

class Employee extends BaseEmployee
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function uploadPhoto(){
		if($file=CUploadedFile::getInstance($this,'profile_link'))
        {
			$photoName = str_replace("/", "-", $this->pf_number).'.JPG';
			$path = Yii::app()->linkManager->staffPublicFolder().'/passports/';
			$oldPassport = $path.$photoName;
			if (file_exists($oldPassport)) unlink($oldPassport);
			if ($file->saveAs($path.$photoName)){
				UserActivity::record("edit","Uploaded own profile photo",7);
				Yii::app()->user->setFlash('success', 'New profile photo uploaded successfully.');
				return true;
			}
			else{
				Yii::app()->user->setFlash('error', 'Error encountered while uploading file, please try again.'); 
				return false;
			}
		}
	}
	public function fullName(){ return strtoupper('('.$this->pf_number.') - '.$this->title->name." ".$this->firstname." ".$this->othername." ".$this->surname);}
	public function names(){ return  $this->title->name." ".strtoupper($this->firstname." ".$this->othername." ".$this->surname );}
	public function fullName2(){ return $this->title->name." ".strtoupper($this->firstname." ".$this->othername." ".$this->surname.' ('.$this->pf_number.')');}
	public function postal_address(){ 
		if (!isset($this->employeeContacts[0])) return 'N/A';
		$contact = $this->employeeContacts[0];
		return strtoupper(" P.O. Box ".$contact->postal_address.' '.$contact->postal_code.' '.$contact->town);
	}
	public function mobile(){ 
		if (!isset($this->employeeContacts[0])) return 'N/A';
		$contact = $this->employeeContacts[0];
		$this->mobile = $contact->mobile;
		$this->save();
		return $contact->mobile;
	}
	public function email(){ 
		//return 'ishmaelny@gmail.com';
		if (!isset($this->employeeContacts[0])) return;
		$contact = $this->employeeContacts[0];
		//$this->email = $contact->email;
		//$this->save();
		return $contact->email;
	}
	public static function activeList(){
		return Employee::model()->findAll(array('condition'=>'status=2','order'=>'surname ASC'));
	}
	public static function allList(){
		return Employee::model()->findAll(array('order'=>'surname ASC'));
	}
	public static function managerPositions(){
		return array(5,8,24,25,49,47,71,72,74,79,84,85,86,108,113,137,139,177,199,198,221,222);
	}
	public static function hoDs(){
		$criteria = new CDbCriteria;
		$criteria->addInCondition('id',array(336,905,1109,849,870,874,1287,980,769,1770,488,929,916,1159,1784,1839,1866,1872));
		$criteria->order = 'firstname ASC';
		return Employee::model()->findAll($criteria);
	}
	public static function sameAs($id){
		return (Yii::app()->user->id==$id);
	}
	public function professorName(){
		if (($this->title_id==12)||($this->title_id==13)||($this->title_id==14))
			return '('.$this->title->long_name.')';
		
	}
	//validate passoword for students
	public function validatePassword($password)
	{
		if (empty($this->password))
		return $password===$this->id_number;
		else return (md5($password)===$this->password);
	}
	public function otherProfessors($id){
		if ($id==6) $h = '<h1>Other Full Professors</h1><hr/>';
		else $h = '<h1>Other Associate Professors</h1><hr/>';
		$staff = Employee::model()->findAll('title_id='.$id.' AND status=7');
		 $str ='';
		$i=0; foreach($staff as $d){
			if ($d->termination_reason=="Leave of Absence"){
				$l = '<h5 class="link">'.($i+1).' ) '.strtoupper($d->title.' '.$d->firstname.' '.$d->othername.' '.$d->surname.'</h5>').'[ ON '.$d->termination_reason.']';
				$str .= GxHtml::link($l, array('/portal/profile/public', 'id' => $d->id));
				$i++;
			}
			
		} 
		if (!empty($str)) return $h.$str;
	}
}
