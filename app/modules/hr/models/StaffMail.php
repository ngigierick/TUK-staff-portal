<?php

Yii::import('application.modules.hr.models._base.BaseStaffMail');

class StaffMail extends BaseStaffMail
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
	
	public static function sendLeaveNotification($leave,$staff,$hod){
		$app = EmployeeLeaveApplication::model()->findByPk($leave);
		$staff = Employee::model()->findByPk($staff);
		$head = Employee::model()->findByPk($hod);
		$mail = new StaffMail;
		$mail->staff_id = $hod;
		$mail->subject = $subject = "Application for ".$app->leave;
		$body = "<b>Dear ".$head->names().',</b><br/><br/>';
		$body .= "I, ".$staff->names().' of payroll number '.$staff->pf_number.', wishes to go for '.$app->taken_days
		.' days '.$app->leave.' starting from '.$app->start_date.' and ending on '.$app->end_date.'.<br/><br/>';
		$body .="My leave address will be ".$staff->postal_address().'.<br/><br/>';
		$body .="My telephone will be ".$staff->mobile().'.<br/>';
		
		$body .='<br/><br/>Thank you.<br/>';
		$body .=$staff->names().'<br/>';
		$mail->body = $body;
		$mail->status_id = 0;
		$mail->category = 1;//leave application
		$mail->item_id = $app->id;//leave id
		$mail->date_created = date('D, d/m/Y  h:i:s A');
		$mail->date_modified = time();
		$mail->sender_id = $staff->id;
		$subject2 = "Leave Application Submitted";
		$body2 = "<b>Dear ".$staff->names().',</b><br/><br/>';
		$body2 .= "Your application for ".$app->leave.' starting from '.$app->start_date.' and ending on '.$app->end_date." has been submitted to your Supervisor, ".
		$head->names().". <br/>";
		if (!$mail->save()) { echo CHtml::errorSummary($mail); exit;} 
		if (!empty($head->email())) Yii::app()->user->setFlash('error','<b>Kindly notify your Supervisor immediately to approve your leave application. No contact details found for your Supervisor for automatic notification.</b>');
		else EmailNotification::record('leaveApplication',$head->id,User::userCategory('staff'),0,$head->email(),$subject,$body);
		if (!empty($staff->email())) EmailNotification::record('leaveApplication',$head->id,User::userCategory('staff'),0,$staff->email(),$subject2,$body2);
	}
	public static function sendApprovalNotification($leave,$staff,$hod, $id){
		$app = EmployeeLeaveApplication::model()->findByPk($leave);
		if ($app->status==1) {
			$status = " Rejected! ";
			$message = "Your leave application has been rejected.";
		}
		if ($app->status==2){
			$status = " Approved! ";
			$message = "Your leave application has been approved and submitted to the HR.";
		} 
		$staff = Employee::model()->findByPk($staff);
		$head = Employee::model()->findByPk($hod);
		$mail = new StaffMail;
		$mail->staff_id = $staff->id;
		$mail->subject = $subject = "Application for ".$app->leave.$status;
		$body = "Dear ".$staff->title.' '.$staff->surname.',<br/>';
		$body .= $message;
		$mail->body = $body;
		$mail->status_id = 0;
		$mail->category = 1;//leave application
		$mail->item_id = $app->id;//leave id
		$mail->date_created = date('D, d/m/Y  h:i:s A');
		$mail->date_modified = time();
		$mail->sender_id = $hod;
		$mail->parent_id = $id;
		if (!$mail->save()) { echo CHtml::errorSummary($mail); exit;} 
		EmailNotification::record('leaveApplication',$staff->id,User::userCategory('staff'),0,$staff->email(),$subject,$body);
	}
	public static function received(){
		return new CActiveDataProvider('StaffMail', array(
											'criteria'=>array(
												'condition'=>'staff_id='.Yii::app()->user->id,
												'order'=>'id DESC',
											),
											'pagination'=>array(
											'pageSize'=>20,
					),
		));
	}
	public static function sent(){
		return new CActiveDataProvider('StaffMail', array(
											'criteria'=>array(
												'condition'=>'sender_id='.Yii::app()->user->id,
												'order'=>'id DESC',
											),
											'pagination'=>array(
											'pageSize'=>20,
					),
		));
	}
	public function status(){
		if ($this->status_id==0) return "<span class='unread'>Unread</span>";
		return "<span class='read'>Read</span>";
	}
	public function setRead(){
		if ($this->sender_id!=Yii::app()->user->id)
			$this->status_id = 1;
		$this->date_modified = time();
		$this->save();
	}
	public static function getParent( $mails, $mail ){
	
		
		if(!empty($mail->parent_id)){
		
			$parent = StaffMail::model()->findByPk($mail->parent_id);
			$mails[] = $parent;
			return StaffMail::getParent( $mails, $parent );
		}
		else{
				
			krsort($mails);
			return $mails;
		}
	
	}
	public static function inbox(){
		$m = StaffMail::model()->findAll('staff_id='.Yii::app()->user->id.' AND status_id=0');
		if (count($m)<1) return;
		$str = "<table class='table table-bordered table-stripped table-condensed'><tr><th>Subject</th><th>Sender</th><th colspan='2'>Date sent</th></tr>";
		for ($i=0;$i<count($m);$i++){
			$l = $m[$i];
			$str .= 
			"<tr>
				<td>".$l->subject."</td>
				<td>".$l->sender."</td>
				<td>".$l->date_created."</td>
				<td><a href='".Yii::app()->createUrl('portal/staffMail/view',array('id'=>$l->id))."'>view</a></td>
			</tr>";
		}
		$str .= "</table>";
		return $str;
	}
	public function leaveForApproval(){
		$app = EmployeeLeaveApplication::model()->findByPk($this->item_id);
		return (($this->category==1) && (!empty($app->id)) && ($app->status==0) && (!empty($app->staff_id)!=Yii::app()->user->id));
	}
}
