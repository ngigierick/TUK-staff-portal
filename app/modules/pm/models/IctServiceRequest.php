
<?php
Yii::import('application.modules.hr.models.*');
Yii::import('application.modules.pm.models._base.BaseIctServiceRequest');

class IctServiceRequest extends BaseIctServiceRequest
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
		switch($this->status){
		
			case 0: $this->statustxt = '<span class="icon-book">&nbsp;</span>&nbsp; <span class="unread">PENDING</span>';
			break;
			case 1: $this->statustxt = '<span class="icon-thumbs-up">&nbsp;</span>&nbsp;<span class="pending brown">ALLOCATED</span>';
			break;
			case 2: $this->statustxt = '<span class="icon-upload">&nbsp;</span>&nbsp;<span class="pending">IN PROGRESS!</span>';
			break;
			case 3: $this->statustxt = '<span class="icon-ok">&nbsp;</span>&nbsp;<span class="read">COMPLETED</span>';
			break;
			default: $this->statustxt = '<span class="icon-remove">&nbsp;</span>&nbsp;<span class="read">Undefined</span>';
		}
			
	}
	
	public function sendNewRequestAlert()
	{
		
	}
	
}
