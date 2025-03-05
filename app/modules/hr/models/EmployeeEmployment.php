<?php

Yii::import('application.modules.hr.models._base.BaseEmployeeEmployment');

class EmployeeEmployment extends BaseEmployeeEmployment
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function beforeSave()
    {
		$this->date_modified=time();
		return parent::beforeSave();
    }
	public function afterSave()
    {
		$this->updateCurrentDesignation();
		return parent::afterSave();
    }
	public function afterDelete()
    {
		$this->updateCurrentDesignation();
		return parent::afterDelete();
    }
	
	public function updateCurrentDesignation(){
		
		$staff = Employee::model()->find('lower(pf_number)=?',array(strtolower($this->pf_number)));
		$criteria = new CDbCriteria;
		$criteria->condition  = "lower(t.pf_number)='".strtolower($this->pf_number)."' AND level_id=1";
		$criteria->order="to_timestamp(d_start, 'DD/MM/YYYY') DESC";
		$employment = EmployeeEmployment::model()->findAll($criteria);
		if (count($employment)>0){
			$staff->current_designation_id = $employment[0]->position_id;
			$staff->current_employment_id = $employment[0]->id;
		}
		else $staff->current_designation_id = $staff->current_employment_id = 0;
		if (!$staff->save()) echo CHtml::errorSummary($staff);
		//$this->updateEmployment();
	}
	public function updateEmployment(){
		$e = Employee::model()->findAll('lower(pf_number)=?',array(strtolower($this->pf_number)));
		for ($i=0;$i<count($e);$i++){
			$em = $e[$i];
			if (EmployeeEmployment::model()->count("pf_number='".$em->pf_number."'")>1){
				$criteria = new CDbCriteria;
				$criteria->condition = "pf_number='".$em->pf_number."'";
				$criteria->order="to_date(d_start, 'DD/MM/YYYY') DESC";
				$ep = EmployeeEmployment::model()->findAll($criteria);
				for ($j=0;$j<count($ep);$j++){
					$cur  = $ep[$j];
					if (isset($ep[$j+1])){
						$prev = $ep[$j+1];
						$cur->employment_id = $prev->id;
						$old = substr($prev->employee_ref,0,2);
						$new = substr($cur->employee_ref,0,2);
						if (($old=='CT') && ($new=='CT')) $category = 2;
						if (($old=='CT') && ($new=='AC')) $category = 3;
						if (($old=='CT') && ($new=='NT')) $category = 4;
						if (($old=='AC') && ($new=='AC')) $category = 5;
						if (($old=='NT') && ($new=='NT')) $category = 6;
						if (($old=='AC') && ($new=='CT')) $category = 7;
						if (($old=='NT') && ($new=='CT')) $category = 8;
					}
					else $category = 1;
					$cur->category = $category;
					$cur->save();
				}
				
			}
			else{
				$this->category = 1;
				$this->save();
			}
		}
	}
	public function setTerminationDate($d){
		$this->d_end = $d;
		return parent::beforeSave();
	}
	public function complete($update=false,$post){
		$this->pf_number = strtoupper(preg_replace('/\s+/', '', $this->pf_number));
		$this->date_modified=time();
		$this->status = 1;//active;
		$this->category_id = $post['category_id'];
		$this->category = 1;//assuming it is the first deployment
		$this->salary_scale_id = $post['salary_scale_id'];
		$this->office_id = $post['office_id'];
		$this->position_id = $post['position_id'];
		$this->level_id = $post['level_id'];
		if(isset($post['consolidated'])){
				$this->grade_id = 1;
				$this->starting_grade_id = 1;
				$this->salary_scale_id = 1;
		}
		else $this->consolidated_salary=0;

		//update if contract
		if ($this->type_id == 2) {
			$started = DateTime::createFromFormat('d/m/Y',$this->d_start);
			$ct = ContractPeriod::model()->findByPk($this->contract_id);
			$st = 'P'.$ct->duration.'M';
			$interval = new DateInterval($st);
			$started->add($interval);
			$this->d_end = $started->format('d/m/Y');
		}
		$error = "";
		if ($update) if (EmployeeEmploymentTmp::model()->exists('emp_id='.$this->id.' AND status_id=0'))
			$error .= "Sorry there is a pending update awaiting approval, kindly alert the one in charge of approval to effect the current updates first.";
		$exists = 0;
		$c = EmployeeEmployment::model()->count('LOWER(pf_number)=? AND  d_start=?', array(strtolower($this->pf_number),$this->d_start));
		if ($update){
			if ($c>1) $exists = 1;
		} 
		else if ($c>0) $exists = 1;
		if ($exists==1) $error .= "The employment details already exists, this may be due to setting same position at the same period.";
		$this->category_id = intVal($this->category_id);
		$this->salaryScale->category_id = intVal($this->salaryScale->category_id);
		//
		if ($this->category_id != $this->salaryScale->category_id )
			$error .= '<br /><b>Error encountered, mismatch in the salary scale: employee is in '.$this->category.' while salary is selected for '.$this->salaryScale->category.' !</b>';
		if ( ($this->type_id == 1) && ($this->contract_id > 0 ) )
			$error .= '<br /><b>Error encountered, mismatch in employement, permanent terms should not be based on contract duration !</b>';
		if ( ($this->type_id == 2) && ($this->contract_id < 0 ) )
			$error .= '<br /><b>Error encountered, mismatch in employement, contract terms must have contract duration !</b>';
			
		return $error;
	}
	public function reportLabels() {
		return array(
		
			'' => Yii::t('app', '- Select -'),
			'category_id' => Yii::t('app', 'Category eg Admin Vs Academic'),
			'type_id' => Yii::t('app', 'Terms eg Permanent, Contract'),
			//'contract_id' => Yii::t('app', 'Contract Duration'),
			'grade_id' => Yii::t('app', 'Grade'),
			//'position_id' => Yii::t('app', 'Position eg Lecturer'),
			//'starting_grade_id' => Yii::t('app', 'Starting Grade eg IV, V'),
			//'d_start' => Yii::t('app', 'Date of Start'),
			//'increment_date' => Yii::t('app', 'Increment Date'),
			//'salary_scale_id' => Yii::t('app', 'Salary Scale'),
			
		);
	}
	
	public static function relationName($field, $id) {
		
		
		switch ($field) {
			
			case 'position_id': $model =  new Position; break;
			case 'category_id': $model = new EmployeeCategory; break;
			case 'grade_id': $model = new Grade; break;
			case 'starting_grade_id': $model = new Grade; break;
			case 'type_id': $model = new EmploymentTerms; break;
			case 'contract_id': $model = new ContractPeriod; break;
			//case 'type_id': $model = new EmploymentTerms; break;
			//case 'type_id': $model = new EmploymentTerms; break;
			default:
				return '';
				break;
		}
		
		
		 return $model::model()->findByPk($id)->name;
				
				
	}
	public static function 	getCondition(){
		return "WHERE pol_employee_employment.id = pol_employee.current_employment_id AND pol_employee.status=2";
	}
	public function incrementDate(){return ($this->increment_date==1)?"January":"July";}
	public static function tmp(){
		$list= Yii::app()->db->createCommand('select * from pol_tmp7')->queryAll();
		foreach($list as $item){
			$ps = Position::model()->findAll("lower(name) like '%".strtolower($item['names'])."%'");
			if (isset($ps[0]->id)){
				for ($i=0;$i<count($ps);$i++){
					$p = $ps[$i];
					$p->name_id=$item['p_id'];
					$p->save();
				}
				
			}

		}
	}
	public function level(){
		if ($this->level_id==1) return "<span class='read'>Primary</span>";
		if ($this->level_id==2) return "<span class='teal'>Secondary</span>";
		return "<span class='unread'>Not yet set</span>";
	}
}
