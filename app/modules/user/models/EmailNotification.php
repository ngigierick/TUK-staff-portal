<?php

Yii::import('application.modules.user.models._base.BaseEmailNotification');

class EmailNotification extends BaseEmailNotification
{
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function record($name,$user,$category,$time,$email,$subject,$message){
		$n = new EmailNotification;
		$n->notification_name = $name;
		$n->email = $email;
		$n->subject = $subject;
		$n->message = $message;
		$n->user_id = $user;
		$n->category = $category;
		$n->time_to_trigger = $time;
		$n->date_time_gerated =  date('Y-m-d H:i:s');
		$n->status = 0;
		if (!$n->save()) {echo CHtml::errorSummary($n); exit;}
	}
	public static function triggerNotification(){
	   $criteria=new CDbCriteria;
	   $criteria->condition='status=0';
	   $criteria->order='id ASC';
	   $criteria->limit=2;
	   $n = EmailNotification::model()->findAll($criteria);
	   for($i=0;$i<count($n);$i++) $n[$i]->execute();
   }
	public function execute(){
		if (Yii::app()->utility->sendEmail(null, $mail,$this->email, $subject, $message))
			$this->close();	
	}
	public function close(){
		$this->date_time_sent =  date('Y-m-d H:i:s');
		$this->status = 1;
		$this->save();
	}
	
}
