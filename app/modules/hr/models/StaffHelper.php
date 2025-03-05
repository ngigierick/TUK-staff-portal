<?php
class StaffHelper
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function recordView($id){
		$model = Employee::model()->findByPk($id);
		//Radcheck::updateCredentials($model->reg_number,$model->id_number);
		$details = "viewed staff ".$model->fullName2()." with ID".$model->id;
		UserActivity::record('view',$details);
			
	} 
	public static function pic($model){
		if(empty($model->photo))$photo = str_replace("/", "-", $model->pf_number).'.JPG';
		else $photo = $model->photo;
		$photo = Yii::app()->linkManager->staffMediaURL().'/passports/'.$photo;
		return '<div class="staff-profile">'.
		CHtml::image($photo,'Missing photo').
		'</div>'; 
	}
	public static function picSmall($model){
		if(empty($model->photo))$photo = str_replace("/", "-", $model->pf_number).'.JPG';
		else $photo = $model->photo;
		$photo = Yii::app()->linkManager->staffMediaURL().'/passports/'.$photo;
		return '<div class="staff-profile-small">'.
		CHtml::image($photo,'Missing photo').
		'</div>'; 
	}
	public static function kraPic(){
		$photo = Yii::app()->linkManager->mediaBaseURL().'/general/kra.jpg';
		return '<div class="staff-profile-small">'.
		CHtml::image($photo,'Missing photo').
		'</div>'; 
	}
	
	public static function employmentAndEducationStatus($model){
		$st = '';
		$was = "";
		if ($model->status==7){
			$was = "Was ";
			$st = '<span class="pending"><i>['. $model->termination_reason.']</i></span><br />';
		}
		else $st = '<span class="read"><i> [Active Staff]</i></span><br/>';
		if (($model->current_employment_id>0) && (!empty(EmployeeEmployment::model()->findByPk($model->current_employment_id)->id))){
			$vowels = array('a','e','i','o','u');
			$hq = EmployeeEmployment::model()->findByPk($model->current_employment_id); 
			if (isset($hq->id)){
				$position = $hq->position;
				$v = '';
				$pos = strtolower(substr($position, 0, 1));
				if(in_array($pos, $vowels)) $v = 'an';
				if (!empty($was)) $was .= $v;
			} $st .= $was.' '.ucwords(strtolower($position)).', '.strtoupper($hq->office);
		}
		else{
			 $st .='No employment information available';
			if (User::isDataEntryClerk()) $st .= CHtml::link('<span id="add_new_item" class="icon-plus" ></span>Add ', array('//hr/employeeEmployment/create','id'=>$model->id));
		}
		$st = "<h3>".$st."</h3>";
		if ($model->highest_qualification_id>0)
			$hql = EmployeeQualificationLevel::model()->findByPk($model->highest_qualification_id); 
				if (isset($hql->id)) $st .= $hql->name." Holder<br /><br /><br />";
		return $st;
	}
	public static function employment($model){
		$st = '';
		if (($model->current_employment_id>0) && (!empty(EmployeeEmployment::model()->findByPk($model->current_employment_id)->id))){
			$hq = EmployeeEmployment::model()->findByPk($model->current_employment_id); 
			if (isset($hq->id)){
				$position = $hq->position;
			} $st .= ucwords(strtolower($position)).', '.strtoupper($hq->office);
		}
		else{
			 $st .='No employment information available';
			if (User::isDataEntryClerk()) $st .= CHtml::link('<span id="add_new_item" class="icon-plus" ></span>Add ', array('//hr/employeeEmployment/create','id'=>$model->id));
		}
		
		return $st;
	}
	public static function qualifcations($model){
		$st = '';
		
		if ($model->highest_qualification_id>0){
			$hql = EmployeeQualificationLevel::model()->findByPk($model->highest_qualification_id); 
				if (isset($hql->id)) $st .= $hql->name." ";
		}
		else $st = 'N/A'; 	
		return $st;
	}
	public static function qualificationsAreas($model){
		$str = array();
		foreach($model->employeeQualifications as $relatedModel)
			if ($relatedModel->level->weight<5) $str[]= ucwords(strtolower($relatedModel->name));
		$result = array_unique($str);
		return implode(", ",$result);
	}
	public static function isManager($pf_number){
		$model = Employee::model()->find('LOWER(pf_number)=?',array(strtolower($pf_number)));
		if (!isset($model->id)) return false;
		$employment = EmployeeEmployment::model()->findByPk($model->current_employment_id);
		if (!isset($employment->id)) return false;
		return in_array($employment->position->id,StaffHelper::managerPositions(),true);
	}
	public static function managerPositions(){
		return array(5,8,24,25,49,47,71,72,74,79,80, 84,85,86,108,113,137,139,199,198,221,222,225,241,245,52,226,155,265);
	}
	public static function topManagement(){
		return array(199,72,79,268,258,267,266,273,274);
	}
	public static function managerOffice($pf_number,$st=''){
		$model = Employee::model()->find('LOWER(pf_number)=?',array(strtolower($pf_number)));
		if (!isset($model->id)) return 0;
		$employment = EmployeeEmployment::model()->findByPk($model->current_employment_id);
		if (!isset($employment->id)) return 0;
		if (!empty($st)) return $employment->office->id;
		return strtoupper($employment->office);
	}
	public static function currentGrade($pf_number,$st=''){
		$model = Employee::model()->find('LOWER(pf_number)=?',array(strtolower($pf_number)));
		if (!isset($model->id)) return 0;
		$employment = EmployeeEmployment::model()->findByPk($model->current_employment_id);
		if (!isset($employment->grade->id)) return 0;
		if (!empty($st)) return $employment->grade->id;
		return strtoupper($employment->grade);
	}
	public static function managerOfficer($pf_number,$st=''){
		$model = Employee::model()->find('LOWER(pf_number)=?',array(strtolower($pf_number)));
		if (!isset($model->id)) return 0;
		return $model->id;
	}
	public static function managers(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'd_end is null';
		$criteria->addInCondition('position_id',StaffHelper::topManagement());
		$criteria->with = array('position');
		$criteria->order = 'position.weight ASC';
		return EmployeeEmployment::model()->findAll($criteria);
	}
	public static function getHoDs($officeID){
		$positions 	= StaffHelper::managerPositions();
		$offices[] 	= 1;
		$offices[] 	= $officeID;
		$offices[] 	= Office::model()->findByPk($officeID)->top_level;
		$criteria= new CDbCriteria;
		$criteria->condition = 'd_end is NULL';
		$criteria->addInCondition('office_id', $offices);
		$criteria->addInCondition('position_id', $positions);
		$criteria->order = 'office_id ASC';
		return EmployeeEmployment::model()->findAll($criteria);
	}
	public static function office($model,$opt=''){
		$st = '';
		if (($model->current_employment_id>0) && (!empty(EmployeeEmployment::model()->findByPk($model->current_employment_id)->id))){
			$hq = EmployeeEmployment::model()->findByPk($model->current_employment_id); 
			if (isset($hq->id)){
				$st .= $hq->office;
				if (!empty($opt)) return $hq->id;
			}
			else{
				 $st .='N/A';
			
			}
		}
		return $st;
	}
	public static function specialLeave($id){
		
		$l = EmployeeLongLeave::model()->findAll('staff_id='.$id);
		$str2 = '';
		$str = "<table><tr><th>Category</th><th>Poistion/Course</th><th>Institution</th><th>Start Date</th><th>Expected Completion</th><th>Status</th></tr>";
		for ($i=0;$i<count($l);$i++){
			$edit = '';
			$c = $l[$i];
			if (User::isDataEntryClerk()) $edit .= GxHtml::link("<i class='icon-edit'></i>", array('employeeLeave/updateSpecial', 'id' => $c->id,'staff'=>$c->staff->id)).' | '.
			GxHtml::link("<i class='icon-trash'></i>", array('employeeLeave/deleteSpecial', 'id' => $c->id,'staff'=>$c->staff->id),array('style'=>'cursor: pointer;', 'confirm'=>'Are you sure you want to delete this record?'));
			$str2 .= "<tr><td>".$c->category."</td><td>".$c->engagement."</td><td>".$c->institution.' ('.$c->country.')</td><td>'.$c->start_date.'</td><td>'.$c->expected_completion.'</td><td>'.$c->status().$edit.'</td></tr>';
		}
		if (!empty($str2)) return $str.$str2;
	}
	
	public static function onLeave(){
		$criteria = new CDbCriteria;
		$criteria->condition='is_current';
		$criteria->order='category_id ASC';
		$l = EmployeeLongLeave::model()->findAll($criteria);
		$str2 = '';
		$str = "<table><tr><th>Staff</th><th>Category</th><th>Poistion/Course</th><th>Institution</th><th>Start Date</th><th>Expected Completion</th><th>Status</th></tr>";
		for ($i=0;$i<count($l);$i++){
			$edit = '';
			$c = $l[$i];
			$str2 .= "<tr><td>".($i+1).') '.$c->staff->names()."</td><td>".$c->category."</td><td>".$c->engagement."</td><td>".$c->institution.' ('.$c->country.')</td><td>'.$c->start_date.'</td><td>'.$c->expected_completion.'</td><td>'.$c->status().'</td></tr>';
		}
		if (!empty($str2)) return $str.$str2."</table>";
	}
	
	public static function onLeaveComposition(){
		$criteria = new CDbCriteria;
		$criteria->condition='is_current and end_date is null';
		$criteria->order='category_id ASC';
		$l = EmployeeLongLeave::model()->findAll($criteria);
		$str = '';
		$today 	= new DateTime();
		for ($i=0;$i<count($l);$i++){
			$c 		= $l[$i];
			$sn 	= $i+1;
			$pf 	= $c->staff->pf_number;
			$id 	= $c->staff->id_number;
			$names 	= $c->staff->names();
			$doa1 = $c->staff->doe;
			$qname = '<span class="unread">N/A</span>';
			$qarea = '<span class="unread">N/A</span>';
			$qyr = '<span class="unread">N/A</span>';
			$dpt = '<span class="unread">N/A</span>';
			$terms = '<span class="unread">N/A</span>';
			$county = '<span class="unread">N/A</span>';
			$cat =  '<span class="unread">N/A</span>';
			$doa = '<span class="unread">N/A</span>';
			if ($c->staff->current_employment_id>0){
				$h = EmployeeEmployment::model()->findByPk($c->staff->current_employment_id);
				if (isset($h->id)){
					$jgroup 		= $h->grade;
					$cat 			= $h->categoryN;
					$dpt 			= $h->office;
					if (isset($h->duration->name)) $terms 	= $h->duration->name;
					else $terms 	= "PERMANENT & PENSIONABLE";
					$doa 			= $h->d_start;
					if (isset($h->position->name)) $position = $h->position->name;
				}
			}
			
			if (isset($c->staff->employeeContacts[0]->id))
				$county = $c->staff->employeeContacts[0]->county;
			
			if ($c->staff->highest_qualification_id>0){
				$hq 	= EmployeeQualificationLevel::model()->findByPk($c->staff->highest_qualification_id);
				$q 		= EmployeeQualification::model()->find("lower(pf_number)='".strtolower($c->staff->pf_number)."' AND level_id=".$c->staff->highest_qualification_id);
				if (!isset($q))  EmployeeQualification::updateLatest($c->staff->pf_number);
				if (isset($q)){
					$qyr		 = $q->year;
					$qarea 	= $q->name;
				} 
				$qname 		= $hq->name;
			}
			//age
			if (!DateTime::createFromFormat('m/d/Y', $c->staff->dob)) 
			$age = '<span class="unread">Invalid format('.$c->staff->dob.'</span>';
			else {
				
				$dob = DateTime::createFromFormat('d/m/Y',$c->staff->dob);
				$dff = $today->diff($dob); 
				$age = $dff->format('%y');
			}
			
			//gender
			$gender = $c->staff->gender;
			
			//ethnicity
			$ethnicity = $c->staff->ethnicity;
			
			//disability
			$disability = '<span class="unread">NONE</span>';
			if (isset($c->staff->employeeDisability[0])) $disability = $c->staff->employeeDisability[0]->description;
			
			$str .= "<tr>
			<td>".$sn.".</td>
			<td>".$pf."</td>
			<td>".$names."</td>
			<td>".$id."</td>
			<td>".$qname."</td>
			<td>".$qarea."</td>
			<td>".$qyr."</td>
			<td>".$cat."</td>
			<td>".$position."</td>
			<td>".$jgroup."</td>
			<td>".$dpt."</td>
			<td>".$terms."</td>
			<td>".$doa1."</td>
			<td>".$doa."</td>
			<td>".$county."</td>
			<td>".$age."</td>
			<td>".$gender."</td>
			<td>".$ethnicity."</td>
			<td>".$disability."</td>
			</tr>
			";
			
		}
		return $str;
	}
	public static function dashboard($model){
		return 
		"<h2>Services you may be interested in:</h3>".
		Yii::app()->linkManager->homeLinks();
	}
	public static function personalInfo($model){
		$p = "
		<h3>PERSONAL DATA</h3>
		<table class='table table-condensed  table-bordered account'>
		<tr><td class='lbl'>Salutation:</td><td>".$model->title."</td></tr>
		<tr><td class='lbl'>Surname:</td><td>".$model->surname."</td></tr>
		<tr><td class='lbl'>First Name:</td><td>".$model->firstname."</td></tr>
		<tr><td class='lbl'>Other Names:</td><td>".$model->othername."</td></tr>
		<tr><td class='lbl'>Gender:</td><td>".$model->gender."</td></tr>
		";
		$contact = $model->employeeContacts;
		$contacts = '';
		$academic = "";
		if(isset($contact[0]->faculty)){
			$academic .= 
			"<tr><td class='lbl'>Faculty:</td><td>".$contact[0]->faculty."</td></tr>
			<tr><td class='lbl'>School:</td><td>".$contact[0]->school."</td></tr>
			<tr><td class='lbl'>Department:</td><td>".$contact[0]->department."</td></tr>
			<tr><td class='lbl'>Designation Title:</td><td>".$contact[0]->title."</td></tr>";
		}
		if(isset($contact[0]->id))
		$contacts=
		$academic."
		<tr><td class='lbl'>Official Email:</td><td>".$contact[0]->office_email."</td></tr>
		<tr><td class='lbl'>Office Telephone:</td><td>".$contact[0]->office_telephone."</td></tr>
		<tr><td class='lbl'>Consultation Hours:</td><td>".$contact[0]->consultation_hours."</td></tr>
		<tr><td colspan='2'<h3 class='unread'>If you find these details to be wrong,".
		CHtml::link('<span id="btn btn-primary btn-large" > please correct them here...</span>  ', array('//portal/profile/contacts'))."
		</h3>
		</table>
		";
		$p .= $contacts;
		$p .= GxHtml::closeTag('table');
		return $p;
	}
	public static function contactsDisplay($model,$opt=''){
		$contact = $model->employeeContacts;
		$contacts = '';
		$academic = "";
		if(isset($contact[0]->faculty)){
			$academic .= 
			"<tr><td class='lbl'>Faculty:</td><td>".$contact[0]->faculty."</td></tr>
			<tr><td class='lbl'>School:</td><td>".$contact[0]->school."</td></tr>
			<tr><td class='lbl'>Department:</td><td>".$contact[0]->department."</td></tr>";
		}
		if(isset($contact[0]->id)){
			$more = '';
			if (empty($opt)) $more  = "<tr><td class='lbl'>Personal Mobile:</td><td>".$contact[0]->mobile."</td></tr>
			<tr><td class='lbl'>Personal Email:</td><td>".$contact[0]->email."</td></tr>";
			
			$contacts="<table class='table table-condensed  table-bordered account'>
			".$academic."";
			if (($model->id!=2026)) $contacts .="<tr><td class='lbl'>Current Designation:</td><td>".StaffHelper::employment($model)."</td></tr>";
			$contacts .="
			<tr><td class='lbl'>Office Telephone:</td><td>".$contact[0]->office_telephone."</td></tr>
			<tr><td class='lbl'>Official Email:</td><td>".$contact[0]->office_email."</td></tr>
			".$more."
			<tr><td class='lbl'>Consultation Hours:</td><td>".$contact[0]->consultation_hours."</td></tr>
			</table>
			";
		}
		
		return $contacts;
	}
	public static function qualificationsDisplay($model,$opt=''){
		$ql='';
		if (empty($opt)) $ql  = "<h3>ACADEMIC QUALIFICATIONS</h3>";
		$ql  .=
		"<table class='table table-condensed table-bordered account'>";
		$ql .= '<tr><th>Level</th>
				<th>Qualification Name</th>
				<th>Institution</th>
				<th colspan="3">Year</th>
				';
		$criteria = new CDbCriteria;
		$criteria->with = array('level');
		$criteria->condition  = "t.pf_number='".$model->pf_number."'";
		$criteria->order='level.weight ASC, year DESC';
		$qual 	= EmployeeQualification::model()->findAll($criteria);		
		foreach($qual as $relatedModel) {
			$ql .= GxHtml::openTag('tr');
			$ql .= '<td>'.$relatedModel->level.'</td>';
			if (empty($opt)) $ql .= '<td>'.$relatedModel->name.'('.$relatedModel->award.')</td>';
			else $ql .= '<td>'.$relatedModel->name.'</td>';
			$ql .= '<td>'.$relatedModel->institution.'('.$relatedModel->country.')</td>';
			$ql .= '<td>'.$relatedModel->year.'</td>';
		}
		$ql .= GxHtml::closeTag('table');
		return $ql;
	}
	public static function work($model,$opt=''){
		$emp = "";
		if (empty($opt)) $emp  = "<h3>WORK EXPERIENCE</h3>";
		$emp  .="<table class='table table-condensed  table-bordered account'>";
		$emp .= '<tr><th>Period</th><th>Institution</th><th colspan="3">Position</th></tr>';
		$criteria = new CDbCriteria;
		$criteria->condition  = "t.pf_number='".$model->pf_number."'";
		$criteria->order='ending_date DESC';
		$work 	= EmployeeWork::model()->findAll($criteria);	
		foreach($work as $relatedModel) {
			$emp .= GxHtml::openTag('tr');
			$emp .= '<td>'.$relatedModel->starting_date.' - '.$relatedModel->ending_date.'</td>';
			$emp .= '<td>'.$relatedModel->institution.'</td>';
			$emp .= '<td>'.$relatedModel->position.'</td>';
			if (empty($opt)) $emp .= '<td>'.
			CHtml::link('<span class="icon-edit" >&nbsp;</span>Update', '',  // the link for open the dialog
    		array('style'=>'cursor: pointer;', 'onclick'=>'{loadForm("index.php?r=//hr/employeeWork/update&id='.$relatedModel->id.'"); $("#dialogClassroom").dialog("open");}')).
    		'</td><td> '.
			CHtml::link('<span class="icon-remove" >&nbsp;</span>Delete', 'index.php?r=hr/employeeWork/delete&id='.$relatedModel->id,  
    		array('style'=>'cursor: pointer;', 'confirm'=>'Are you sure you want to delete this work experience?')).
			'</td>';
			$emp .= GxHtml::closeTag('tr');
		}
		if (empty($opt)) $emp .=
			"<tr><td colspan='5'>".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;</span>&nbsp; Add Work Experience', '',  // the link for open the dialog
    		array('style'=>'cursor: pointer;', 'onclick'=>'{loadForm("index.php?r=//hr/employeeWork/create&id='.$model->id.'"); $("#dialogClassroom").dialog("open");}'))
			."</td></tr>";
		$emp .= GxHtml::closeTag('table');
		return $emp;
	}
	public static function statement($model,$opt=''){
		$st = "<table class='table table-condensed  table-bordered account'>";
		if (empty($opt)) $st .= '<tr><th>General statement on research area</th>';
		foreach($model->employeeStatement as $relatedModel) {
			$st .= GxHtml::openTag('tr');
			$st .= '<td>'.$relatedModel->statement.'</td>';
			if (empty($opt)) $st .= '<td>'.
			CHtml::link('<span class="icon-edit" >&nbsp;</span>Update', '',  // the link for open the dialog
    		array('style'=>'cursor: pointer;', 'onclick'=>'{loadForm("index.php?r=//hr/employeeStatement/update&id='.$relatedModel->id.'"); $("#dialogClassroom").dialog("open");}')).
    		'</td><td> '.
			CHtml::link('<span class="icon-remove" >&nbsp;</span>Delete', 'index.php?r=hr/employeeStatement/delete&id='.$relatedModel->id,  
    		array('style'=>'cursor: pointer;', 'confirm'=>'Are you sure you want to delete this statement?')).
			'</td>';
			$st .= GxHtml::closeTag('tr');
		}
	
		if (empty($opt)) $st .=
			"<tr><td colspan='4'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;</span>&nbsp; Add Statement', '',  // the link for open the dialog
    		array('style'=>'cursor: pointer;', 'onclick'=>'{loadForm("index.php?r=//hr/employeeStatement/create&id='.$model->id.'"); $("#dialogClassroom").dialog("open");}'))
			."</td></tr>";
			
		$st .= GxHtml::closeTag('table');
		return $st;
	}
	public static function projects($model,$opt=''){
		$pj = "<table class='table table-condensed  table-bordered account'>";
		if (empty($opt)) $pj .= '<tr><th>Title</th><th>Area</th>';
		foreach($model->employeeProject as $relatedModel) {
			$pj .= GxHtml::openTag('tr');
			$pj .= '<td>'.$relatedModel->title.'</td>';
			$pj .= '<td>'.$relatedModel->area.'</td>';
			if (empty($opt)) $pj .= '<td>'.GxHtml::link("<span class='icon-edit' >&nbsp;</span> Update", array('//hr/employeeProject/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$pj .= GxHtml::closeTag('tr');
		}
		if (empty($opt)) $pj .=
			"<tr><td colspan='5'>".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add research project ', array('//hr/employeeProject/create'))
			."</td></tr>";
		$pj .= GxHtml::closeTag('table');
		return $pj;
	}
	public static function publications($model,$opt=''){
		$pb = "<table class='table table-condensed  table-bordered account'>";
		$pb .= '<tr><th>Title</th><th>Link to pulication</th>';
		foreach($model->employeePublication as $relatedModel) {
			$pb .= GxHtml::openTag('tr');
			$pb .= '<td>'.$relatedModel->title.'</td>';
			$pb .= '<td>'.$relatedModel->link.'</td>';
			if (empty($opt)) $pb .= '<td>'.GxHtml::link("<span class='icon-edit' >&nbsp;</span> Update", array('//hr/employeePublication/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$pb .= GxHtml::closeTag('tr');
		}
		if (empty($opt)) $pb .=
			"<tr><td colspan='5'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add publication ', array('//hr/employeePublication/create'))
			."</td></tr>";
		$pb .= GxHtml::closeTag('table');
		return $pb;
	}
	public static function supervision($model,$opt=''){
		$sp = "<table class='table table-condensed  table-bordered account'>";
		$sp .= '<tr>
				<th>Name</th>
				<th>Project Title</th>
				<th>Period</th>
				';
		
		foreach($model->employeeSupervision as $relatedModel) {
			$sp .= GxHtml::openTag('tr');
			$sp .= '<td>'.$relatedModel->student_name.'</td>';
			$sp .= '<td>'.$relatedModel->title.'</td>';
			$sp .= '<td>'.$relatedModel->period.'</td>';
			if (empty($opt)) $sp .= '<td>'.GxHtml::link("<span class='icon-edit' >&nbsp;</span> Update", array('//hr/employeeSupervision/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$sp .= GxHtml::closeTag('tr');
		}
	
		if (empty($opt)) $sp .=
			"<tr><td colspan='5'>".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add student supervision details ', array('//hr/employeeSupervision/create'))
			."</td></tr>";
			
		$sp .= GxHtml::closeTag('table');
		return $sp;
	}
	public static function courses($model,$opt=''){
		$ct = "<table class='table table-condensed  table-bordered account'>";
		$ct .= '<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Period</th>
				';
	
	
		foreach($model->employeeCourses as $relatedModel) {
			$ct .= GxHtml::openTag('tr');
			$ct .= '<td>'.$relatedModel->course_name.'</td>';
			$ct .= '<td>'.$relatedModel->brief_description.'</td>';
			$ct .= '<td>'.$relatedModel->starting_date.' - '.$relatedModel->ending_date.'</td>';
			if (empty($opt)) $ct .= '<td>'.GxHtml::link("<span class='icon-edit' >&nbsp;</span> Update", array('//hr/employeeCourse/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$ct .= GxHtml::closeTag('tr');
		}
	
		if (empty($opt)) $ct .=
			"<tr><td colspan='5'>".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add course taught ', array('//hr/employeeCourse/create&id='.$model->id))
			."</td></tr>";
			
		$ct .= GxHtml::closeTag('table');
		return $ct;
	}
	public static function professional($model,$opt=''){
		$pr = "<table class='table table-condensed  table-bordered account'>";
		$pr .= '<tr><th>Title</th><th>Institution</th>';
		foreach($model->employeeProfessional as $relatedModel) {
			$pr .= GxHtml::openTag('tr');
			$pr .= '<td>'.$relatedModel->title.'</td>';
			$pr .= '<td>'.$relatedModel->institution.'</td>';
			if (empty($opt)) $pr .= '<td>'.GxHtml::link("<span class='icon-edit' >&nbsp;</span> Update", array('//hr/employeeProfessional/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$pr .= GxHtml::closeTag('tr');
		}
		if (empty($opt)) $pr .=
			"<tr><td colspan='5'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add professional qualifications details ', array('//hr/employeeProfessional/create'))
			."</td></tr>";
			
		$pr .= GxHtml::closeTag('table');
		return $pr;
	}
	public static function extras($model,$opt=''){
		$ex = "<table class='table table-condensed  table-bordered account'>";
		$ex .= '<tr><th>Description</th>';
		$ex .= '<tr><th colspan="5"><hr /></th>';
		foreach($model->employeeExtra as $relatedModel) {
			$ex .= GxHtml::openTag('tr');
			$ex .= '<td>'.$relatedModel->description.'</td>';
			if (empty($opt)) $ex .= '<td>'.GxHtml::link("<span class='icon-edit' >&nbsp;</span> Update", array('//hr/employeeExtra/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$ex .= GxHtml::closeTag('tr');
		}
		if (empty($opt)) $ex .="<tr><td colspan='5'><hr />".
			CHtml::link('<span id="add_new_item" class="icon-plus" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Add extra information ', array('//hr/employeeExtra/create'))
			."</td></tr>";
		$ex .= GxHtml::closeTag('table');
		return $ex;
	}
	public static function docs($model,$opt=''){
		$fl = "<table class='table table-condensed  table-bordered account'>";
		$fl .= '<tr>
				<th>Document category</th>
				<th>Description/ name</th>
				<th colspan="2"></th>

				';
		foreach($model->employeeDocs as $relatedModel) {
			$fl .= GxHtml::openTag('tr');
			$fl .= '<td>'.$relatedModel->category.'</td>';
			$fl .= '<td>'.$relatedModel->file_name.'</td>';
			if (empty($opt)) $fl .= '<td>'.GxHtml::link("<span class='icon-edit' >&nbsp;</span> Update", array('//hr/employeeDoc/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true))).'</td>';
			$fl .= GxHtml::closeTag('tr');
		}
		if (empty($opt)) $fl .=
			"<tr><td colspan='9'><hr/>".
			CHtml::link('<span id="add_new_item" class="icon-upload" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Upload Document ', array('//hr/employeeDoc/create','id'=>$model->id))
			."</td></tr>";
			
		$fl .= GxHtml::closeTag('table');
		return $fl;
	}
}
