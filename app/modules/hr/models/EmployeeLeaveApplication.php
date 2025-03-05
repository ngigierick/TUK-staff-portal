<?php

Yii::import('application.modules.hr.models._base.BaseEmployeeLeaveApplication');

class EmployeeLeaveApplication extends BaseEmployeeLeaveApplication
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function status(){
		if ($this->status==0) return "<span class='pending'>Awaiting HOD/Reporting Officer Approval</span>";
		if ($this->status==1) return "<span class='unread'>Rejected by HOD/Reporting Officer </span>";
		if ($this->status==2) return "<span class='olive'>Approved by HOD/Reporting Officer, Awaiting HR Approval</span>";
		if ($this->status==3) return "<span class='unread'>Approved by HOD/Reporting Officer, but Rejected by HR</span>";
		if ($this->status==4) return "<span class='read'>Approved by HR!</span>";
	}
	public function approveByHoD(){
		if ($this->status==0) return "Kindly choose whether to approve or reject the application";
		if (($this->status==1) && empty($this->hod_approval_remarks))return "Kindly provide reasons for rejecting this application";
		if (($this->status==2) && empty($this->while_away_staff_id))return "Kindly provide the officer who will perform duties of ".$this->staff." while away from office";
		if ($this->while_away_staff_id==$this->staff_id) return $this->staff." is the one going for leave. Kindly pick another officer.";
		if ((!empty($this->while_away_staff_id)) && (EmployeeLeave::pendingLeave($this->while_away_staff_id,$this->start_date))) return $this->staff2." will still be on leave when ".$this->staff." will want to start the leave on ".$this->start_date.". Kindly pick another officer.";
		$mail = StaffMail::model()->find('item_id='.$this->id);
		$this->hod_approval  = $this->status;
		$this->hod_approval_date = date('D, d/m/Y  h:i:s A');
		$this->save();
		StaffMail::sendApprovalNotification($this->id,$this->staff_id,$this->hod_id,$mail->id);
	}
	
	
}
