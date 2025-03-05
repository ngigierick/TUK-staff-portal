<?php

Yii::import('application.modules.intake.models._base.BaseApplicantMail');

class ApplicantMail extends BaseApplicantMail
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
	
	public function afterFind()
	{
		$this->status_id = ($this->status_id=='0')?'<span class="unread">Unread</span>':'<span class="read">Read</span>';
		$this->sender_id = $this->sender;
		if ($this->sender === 1){
			
			$s = User::model()->findByPk($this->support_id);
			$this->sender = $s->name;
		}
		else{
			
			$s = Applicant::model()->findByPk($this->applicant_id);
			$this->sender = $s->surname.' '.$s->firstname.' '.$s->othername;
		}
	}
}
