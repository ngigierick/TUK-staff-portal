<?php

Yii::import('application.modules.hr.models._base.BaseEmployeeContact');

class EmployeeContact extends BaseEmployeeContact
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function searchInterest($controller, $model,$name){
		$serial = $model->interest_area;
		$controller->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name'=>$name,
			'id'=>'fullSearchp',
			'source'=>$controller->createUrl('//portal/profile/searchInterest'),
			'value' => $serial,
			'options'=>array(
				'delay'=>300,
				'minLength'=>2,
				'showAnim'=>'fold',
			),
			'htmlOptions'=>array(
				'size'=>'40',
				'class'=>'search-query span2',
				'placeholder'=>'Enter interest area',
			),
		));
	}
	public static function processModel(){
		$m = Employee::model()->findByPk(Yii::app()->user->id);
		$pf_number = $m->pf_number;
		$message = 'update';
		$model = EmployeeContact::model()->find("pf_number='".$pf_number."'");
		if (isset($_POST['EmployeeContact'])) {
			$model->setAttributes($_POST['EmployeeContact']);
			if ($model->existing()) {$message = 'Somebody already has these contacts especially the primary email or mobile phone number, kindly contact human resource office for more information.';}
			else if ($model->save()){ 
				$message = '';
				$model->sendNotification();
				Yii::app()->user->setFlash('success', 'Contact changes have been saved successfully!');
				UserActivity::record('update','Added contact information- '.$model->mobile.' ID- '.$model->id);
			}
			else $message = CHtml::errorSummary($model);
			if (!empty($message)) Yii::app()->user->setFlash('error',$message);
		}
		$data['model'] = $model;
		$data['message'] = $message;
		return $data;
	}
	public function existing($update='' ){
		$email = strtolower($this->email);
		$mobile = $this->mobile;
		$this->updated = 1;
		return (EmployeeContact::model()->count('LOWER(email)=? OR mobile=?', array($email,$mobile)) > 1 );
		
	}
	public function sendNotification(){
		$staff = $this->pfNumber;
		$message = "<b>Dear ".$staff->names().",</b><br/><br/>
		You have updated your contact details at the Staff ePortal as follows:<br/>
		Primary mobile number: ".$this->mobile."<br/>
		Staff email: ".$this->office_email."<br/>
		Primary email: ".$this->email."<br/>
		Alternative email: ".$this->email2."<br/>
		Alternative mobile: ".$this->mobile2."<br/>
		";
		$subject = "Contacts update";
		EmailNotification::record("contactsUpdate",$this->id,User::userCategory('staff'),0,$this->email,$subject,$message);
	}
	//ensure all models save modification timestamp
	public function beforeSave()
    {
		$this->date_modified=time();
		return parent::beforeSave();
    }
	
}
