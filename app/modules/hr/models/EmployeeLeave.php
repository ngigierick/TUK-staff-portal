<?php

Yii::import('application.modules.hr.models._base.BaseEmployeeLeave');

class EmployeeLeave extends BaseEmployeeLeave
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
    public static function getLeaveDays(){
    	$staffID = Yii::app()->user->id;
    	$year = date('Y');
    	$days = EmployeeLeaveDay::model()->find('staff_id=? AND year=?',array($staffID,$year));
    	$staff_id = Yii::app()->user->id;
		$grade_id = StaffHelper::currentGrade(Yii::app()->user->name,1);
		//type of leave
		$leave = EmployeeLeave::model()->findByPk($leave_id);
		$g1 = array(1,2,3,4,19,20,26);
		$g2 = array(5,6,7,8,9,10,21,22,23,24,25,27);
				//annual
		$total = 0;
		if($leave_id ==1){
			//job group I-IV
			if (in_array($grade_id, $g1)) {
			      $id = 1;
			 }
			else if (in_array($grade_id, $g2)) {
			      $id = 2;
			 }
			else $id = 3;
			$duration = EmployeeAnnualLeaveDuration::model()->findByPk($id);
			$total = $duration->days;	
					
		}//Maternity
		else if ( ($leave_id ==2) || ($leave_id ==3) ){
			$total = $leave->duration->days;
		}
		
		else $total 	= "Determined by HR";
    }
	public static function compute($leave_id){
    	EmployeeLeaveDay::setAnnualDays();
    	$staffID = Yii::app()->user->id;
    	$year = date('Y');
    	$days = EmployeeLeaveDay::model()->find('staff_id=? AND year=?',array($staffID,$year));
    	if (empty($days->id)) return;
		$leave = EmployeeLeave::model()->findByPk($leave_id);
		//take care of the notice
		$s		= DateTime::createFromFormat('d/m/Y', date('d/m/Y'));
		$d 		= '+'. $leave->notice_days.' days';
		//other checks
		if ( ($leave_id ==2) || ($leave_id ==3) ){
			$total = $leave->duration->days;
		}
		
		else $total 	= "Determined by HR";
		//compassionate
		if ($leave_id==4){
			$r = 1;
			$t1 = EmployeeLeaveApplication::model()->find('staff_id='.$staff_id.' AND leave_id=1 AND status=4 AND is_latest');
			if (isset($t->id)) $r = $t1->rem_days;
			if ($r>0) $data['notCompassionate'] = 1;
		}
		$total 	= $days->total;
		$rem 	= $days->balance;
		$s->modify($d);
		$data['rem'] 	= $rem;
		$data['used'] 	= $days->used;
		$data['leave'] 	= $leave->name;
		$data['total'] 	= $total;
		$data['min_date'] 	= $s->format('d/m/Y');
		return $data;

    }
	public static function compute1($leave_id){
	
		$staff_id = Yii::app()->user->id;
		$grade_id = StaffHelper::currentGrade(Yii::app()->user->name,1);
		//type of leave
		$leave = EmployeeLeave::model()->findByPk($leave_id);
		$g1 = array(1,2,3,4,19,20,26);
		$g2 = array(5,6,7,8,9,10,21,22,23,24,25,27);
				//annual
		$total = 0;
		if($leave_id ==1){
			//job group I-IV
			if (in_array($grade_id, $g1)) {
			      $id = 1;
			 }
			else if (in_array($grade_id, $g2)) {
			      $id = 2;
			 }
			else $id = 3;
			$duration = EmployeeAnnualLeaveDuration::model()->findByPk($id);
			$total = $duration->days;	
					
		}//Maternity
		else if ( ($leave_id ==2) || ($leave_id ==3) ){
			$total = $leave->duration->days;
		}
		
		else $total 	= "Determined by HR";
		//compassionate
		if ($leave_id==4){
			$r = 1;
			$t1 = EmployeeLeaveApplication::model()->find('staff_id='.$staff_id.' AND leave_id=1 AND status=4 AND is_latest');
			if (isset($t->id)) $r = $t1->rem_days;
			if ($r>0) $data['notCompassionate'] = 1;
		}
		//stats
		$rem = $total;
		$t = EmployeeLeaveApplication::model()->find('staff_id='.$staff_id.' AND leave_id='.$leave_id." AND start_date like '%/".date('Y')."' AND  status=4 AND is_latest");
		if (isset($t->id)) $rem = $t->rem_days;
		//take care of the notice
		$s	= DateTime::createFromFormat('d/m/Y', date('d/m/Y'));
		$d = '+'. $leave->notice_days.' days';
		$s->modify($d);
		$data['rem'] 	= $rem;
		$data['used'] 	= $rem;
		$data['leave'] 	= $leave->name;
		$data['total'] 	= $total;
		$data['min_date'] 	= $s->format('d/m/Y');
		return $data;
	}
	public static function daysDiff($leave_id, $start_date,$end_date, $hod)
	{
		//correct dates selected but days exhausted	
		$start 	= DateTime::createFromFormat('d/m/Y', $start_date);
		$end 	= DateTime::createFromFormat('d/m/Y', $end_date);	
		$leave = EmployeeLeave::model()->findByPk($leave_id);
		//no valid dates selected
		if ( (!$start) || (!$end) ) {
			
			$days = -1;
			$data['requested'] = $days;
			$data['nodate'] = 1;
			return $data;
		}
		//wrong set of dates
		if ($start>$end){
			
			$days = -1;
			$data['requested'] = $days;
			
			return $data;
		} 
		//notice
		$s	= DateTime::createFromFormat('d/m/Y', date('d/m/Y'));
		$d = '+'. $leave->notice_days.' days';
		$s->modify($d);
		/*if ($s>$start){
			
			$days = -1;
			$data['requested'] = $days;
			$data['notice'] = 1;
			return $data;
		} */
		$start->format('d/m/Y');
		$end->format('d/m/Y');
		$data['expected_end'] 		= $end->format('D, d/m/Y');//cature end date before modification
		// otherwise the  end date is excluded (bug?)
		$end->modify('+1 day');
		
		$interval = $end->diff($start);
		// total days
		$days = $interval->days;
		
		$holidays = array();
		
		//annual or compassionate 
		if ( ($leave_id==1) || ($leave_id==4) ){
			
			// create an iterateable period of date (P1D equates to 1 day)
			$period = new DatePeriod($start, new DateInterval('P1D'), $end);
	
			// best stored as array, so you can add more than one
			$holidays = EmployeeLeave::currentHolidays();
			
			$specialHolidays = EmployeeLeave::specialHolidays();
			foreach($period as $dt) {
			    	
			    $curr = $dt->format('D');
			
			    // for the updated question
			    if (in_array($dt->format('d/m/Y'), $holidays)) {
			       $days--;
			    }
			
				// special holidays
			    if (in_array($dt->format('d/m/Y'), $specialHolidays)) {
			       $days--;
			    }
				
			    // substract if Saturday or Sunday
			    if ($curr == 'Sat' || $curr == 'Sun') {
			        $days--;
			    }
			}
		
			
		}
		
		//calculate reporting date
		$reporting = $end;
		while(true){
			if ( (!in_array($reporting->format('d/m/Y'), $holidays)) && ( $reporting->format('D') != 'Sat' ) && ( $reporting->format('D') != 'Sun' ) ) break;
			else $reporting->modify('+1 day');
		}
		
		$hod = Employee::model()->findByPk($hod);
		$data['requested'] 				= $days;
		$data['rem'] 					= $days;
		$data['expected_start'] 		= $start->format('D, d/m/Y');
		//$data['expected_end'] 		=$end->format('D, d/m/Y');
		$data['expected_reporting'] 	= $reporting->format('D, d/m/Y');
		$data['report'] 				= $reporting->format('d/m/Y');
		if (empty($hod->id)) return $data;
		$data['hod_id'] 				= $hod->id;
		$data['hod'] 					= $hod->names();
		return $data; 
		
	}
	
	public static function specialHolidays(){
		
		$apps = EmployeeLeaveSpecialHoliday::model()->findAll('year='.date('Y'));
		$h = array();
		for ($i=0;$i<count($apps);$i++){
			$h[] = $apps[$i]->date;
		}
		return $h;
	}
	
	public static function currentHolidays(){
		
		return array('01/01'.'/'.date('Y'),  '01/05'.'/'.date('Y'), '01/06'.'/'.date('Y'), '20/10'.'/'.date('Y'), '25/12'.'/'.date('Y'), '26/12'.'/'.date('Y') );
	}
	
	public static function holidays(){
		
		return array('01/01',  '01/05', '01/06', '20/10', '25/12', '26/12' );
	}
	public static function updateLeave($leave, $staff, $hod)
	{
		
		$apps = EmployeeLeaveApplication::model()->findAll('staff_id='.$staff.' AND id!='.$leave);
		for ($i=0;$i<count($apps);$i++){
			
			$apps[$i]->is_latest = false;
			$apps[$i]->save();
		}
		StaffMail::sendLeaveNotification($leave,$staff,$hod);
		
	}
	public static function pendingLeave($staff,$today='')
	{
		if (empty($today)) $today = DateTime::createFromFormat('d/m/Y',date('d/m/Y'));
		$apps = EmployeeLeaveApplication::model()->findAll('staff_id='.$staff.' AND (status=0 OR status=2 OR status=4)');
		$s = false;
		for ($i=0;$i<count($apps);$i++){
			$end = DateTime::createFromFormat('d/m/Y', $apps[$i]->end_date);	
			if ($end>$today){ $s = true;}
		}
		return $s;
	}
	
	public static function formatDate( $date ){
		
		$d = DateTime::createFromFormat('d/m/Y', $date);
		
		if ($d) return $d->format('D, d/m/Y'); else return $date;
	}

	public static function addLeaveDays($d){
		
		$date = $d->format('d/m/Y');
		
		if ( ($d->format('D')!='Sat') && ($d->format('D')!='Sun') ){
			
						
			$condition = " to_date('".$date."', 'DD/MM/YYYY') >= to_date(start_date, 'DD/MM/YYYY') AND  to_date('".$date."', 'DD/MM/YYYY') <=  to_date(end_date, 'DD/MM/YYYY') AND ( leave_id=1 OR leave_id=4) ";
			$criteria=new CDbCriteria;
			$criteria->condition = $condition;
			
			$apps = EmployeeLeaveApplication::model()->findAll($criteria);
			//echo count($apps);exit;
			for ($i=0;$i<count($apps);$i++){
				
				$apps[$i]->taken_days = $apps[$i]->taken_days-1;
				$apps[$i]->rem_days = $apps[$i]->rem_days+1;
				$apps[$i]->save();
				
			}
			
		}
		
	}

	public static function addLeaveDaysBroughtForward($days, $staff_id){
		
		$apps = EmployeeLeaveApplication::model()->findAll('staff_id='.$staff_id.' AND leave_id=1 AND  status=4 AND is_latest');
			
		for ($i=0;$i<count($apps);$i++){
			
			$apps[$i]->total_days = $apps[$i]->total_days + $days;
			$apps[$i]->rem_days = $apps[$i]->rem_days+$days;
			$apps[$i]->save();
		}
	}
}
