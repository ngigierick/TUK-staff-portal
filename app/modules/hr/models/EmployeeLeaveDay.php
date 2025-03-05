<?php

Yii::import('application.modules.hr.models._base.BaseEmployeeLeaveDay');

class EmployeeLeaveDay extends BaseEmployeeLeaveDay
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function setAnnualDays(){
		$staffID = Yii::app()->user->id;
    	$year = date('Y');
    	$days = EmployeeLeaveDay::model()->find('staff_id=? AND year=?',array($staffID,$year));
    	if (isset($days->id)) return;
    	$gradeID = StaffHelper::currentGrade(Yii::app()->user->name,1);
    	$days->staff_id = $staffID;
    	$days->grade_id = $gradeID;
    	$days->leave_id = 1;
    	$days->pf_number = Yii::app()->user->name;
    	$days->year = $year;
    	//type of leave
		$leave = EmployeeLeave::model()->findByPk($leave_id);
		$g1 = array(1,2,3,4,19,20,26);
		$g2 = array(5,6,7,8,9,10,21,22,23,24,25,27);
		//annual
		$total = 0;
		//job group I-IV
		if (in_array($gradeID, $g1)) {
		      $id = 1;
		 }
		else if (in_array($gradeID, $g2)) {
		      $id = 2;
		 }
		else $id = 3;
		$duration = EmployeeAnnualLeaveDuration::model()->findByPk($id);
		$total = $duration->days;	
		////////////////////////
    	$days->total = $total;
    	$days->bf = 0;
    	$days->used = 0;
    	$days->balance = $total;
    	$days->date_modified=time();
    	$days->save();

	}
	public static function updateBalance($staffID,$pf, $gradeID,$total,$used,$bf, $balance){
    	$year = date('Y');
    	$days = EmployeeLeaveDay::model()->find('staff_id=? AND year=?',array($staffID,$year));
    	if (empty($days->id)) $days = new EmployeeLeaveDay;
    	else return;
    	$days->staff_id = $staffID;
    	$days->grade_id = $gradeID;
    	$days->leave_id = 1;
    	$days->pf_number = $pf;
    	$days->year = $year;
    	$days->total = $total;
    	$days->bf = $bf;
    	$days->used = $used;
    	$days->balance = $balance;
    	$days->date_modified=time();
    	$days->save();

    }
}
