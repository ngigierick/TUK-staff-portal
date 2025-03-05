<?php

Yii::import('application.modules.portal.models._base.BaseResearchGrantClaim');

class ResearchGrantClaim extends BaseResearchGrantClaim
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function processSurrender($token,$id){
		if (md5(Yii::app()->user->id)!=$token)
		{echo "<span class='unread'>Access violation encountered. Please contact the system administration for more assistance.</span>";exit;}
		$model = ResearchGrantClaim::model()->findByPk($id);
		$model->scenario="surrender";
		$message = 'new record';
		if (!empty($_POST['ResearchGrantClaim'])) {
			$model->setAttributes($_POST['ResearchGrantClaim']);
			if ($model->save()){ 
				$message = '';
				$model->processUploads();
				Yii::app()->user->setFlash('success', 'Surrender Documents for the Disbursement submitted successfully!');
				UserActivity::record('add','Surrendered Documents for the Disbursement request - '.$model->date_requested.' ID - '.$model->id);
			}
			else{ $message = CHtml::errorSummary($model); Yii::app()->user->setFlash('error', $message);}
		}
		$data['model'] = $model;
		$data['message'] = $message;
		return $data;
	}
	public function processUploads(){
		$model = ResearchGrantClaim::model()->findByPk($this->id);
		$directory = ResearchGrant::uploadDirectory();
		if (isset($model->id)){
			$this->report = $model->report;
			$this->aie = $model->aie;
			$this->imprest_surrender = $model->imprest_surrender;
			$this->imprest_warrant = $model->imprest_warrant;
		}
		if($file=CUploadedFile::getInstance($this,'aie'))
        {
			$rnd = rand(0,9999);
			$fileName = $rnd."_".$file;  
			if (!empty($file)){
				$this->aie = $fileName;
				$old = $directory.$fileName;
				if (file_exists($old)) unlink($old);			
				$file->saveAs($directory.$fileName);
			}
			
        }
		if($file=CUploadedFile::getInstance($this,'report'))
        {
			$rnd = rand(0,9999);
			$fileName = $rnd."_".$file;  
			if (!empty($file)){
				$this->report = $fileName;
				$old = $directory.$fileName;
				if (file_exists($old)) unlink($old);			
				$file->saveAs($directory.$fileName);
			}
			
        }
		if($file=CUploadedFile::getInstance($this,'imprest_surrender'))
        {
			$rnd = rand(0,9999);
			$fileName = $rnd."_".$file;  
			if (!empty($file)){
				$this->imprest_surrender = $fileName;
				$old = $directory.$fileName;
				if (file_exists($old)) unlink($old);			
				$file->saveAs($directory.$fileName);
			}
        }
		if($file=CUploadedFile::getInstance($this,'imprest_warrant'))
        {
			$rnd = rand(0,9999);
			$fileName = $rnd."_".$file;  
			if (!empty($file)){
				$this->imprest_warrant = $fileName;
				$old = $directory.$fileName;
				if (file_exists($old)) unlink($old);			
				$file->saveAs($directory.$fileName);
			}
        }
		$this->save();
	}
	public static function viewModel($token,$id){
		if (md5(Yii::app()->user->id)!=$token)
		{echo "<span class='unread'>Access violation encountered. Please contact the system administration for more assistance.</span>";exit;}
		return ResearchGrantClaim::model()->findByPk($id);
	}
	
	public function status(){
		if ($this->school_approval_user==0) return "<span class='olive'>Pending School approval</span>";
		if ($this->faculty_approval_user==0) return "<span class='teal'>Approved at School, Pending Faculty approval</span>";
		if ($this->research_approval_user==0) return "<span class='teal'>Approved at Faculty, Pending Directorate of Research approval</span>";
		if ($this->vc_approval_user==0) return "<span class='teal'>Approved at Directorate of Research, Pending Vice-Chancellor approval</span>";
		if ($this->finance_approval_user==0) return "<span class='teal'>Approved by the Vice-Chancellor, Pending Finance action</span>";
		if ($this->finance_approval_user>0) return "<span class='read'>Approved</span>";
	}
	public function type(){
		if ($this->type_id==0) return "<span class='teal'>First</span>";
		if ($this->type_id==1) return "<span class='teal'>Second</span>";
		if ($this->type_id==2) return "<span class='teal'>Third</span>";
		if ($this->type_id==3) return "<span class='teal'>Fourth</span>";
		if ($this->type_id==4) return "<span class='teal'>Fifth</span>";
		if ($this->type_id==5) return "<span class='teal'>Sixth</span>";
		if ($this->type_id==6) return "<span class='teal'>Seventh</span>";
	}
	
	public function approvalTrail(){
		if ($this->school_approval_user==0) return "<span>Currently none.</span>";
		$str = "<table>
		<tr><th>LEVEL</th><th>USER</th> <th>DECISION </th><th>DATE</th></tr>";
		if ($this->school_approval_user>0)
			$str .= "<tr><td>SCHOOL</td><td>".$this->user('school')."</td><td>".$this->decision('school')."</td><td>".$this->dates('school')."</td></tr>";
		if ($this->faculty_approval_user>0)
			$str .= "<tr><td>FACULTY</td><td>".$this->user('faculty')."</td><td>".$this->decision('faculty')."</td><td>".$this->dates('faculty')."</td></tr>";
		if ($this->research_approval_user>0)
			$str .= "<tr><td>RESEARCH</td><td>".$this->user('research')."</td><td>".$this->decision('research')."</td><td>".$this->dates('research')."</td></tr>";
		if ($this->vc_approval_user>0)
			$str .= "<tr><td>VICE-CHANCELLOR</td><td>".$this->user('vc')."</td><td>".$this->decision('vc')."</td><td>".$this->dates('vc')."</td></tr>";
		if ($this->finance_approval_user>0)
			$str .= "<tr><td>FINANCE</td><td>".$this->user('finance')."</td><td>".$this->decision('finance')."</td><td>".$this->dates('finance')."</td></tr>";
		
		return $str."</table>";
	}
	public function accountability(){
		$str = '';
		$download = " <span class='btn btn-small btn-success'>";
		$submit = " <span class='btn btn-small btn-warning'>Surrender Neccessary Documents for this Disbursement</span>";
		$directory = ResearchGrant::viewDirectory();
		$str = "<table>
		<tr><th>AIE</th><th>IMPREST WARRANT</th> <th>IMPREST SURRENDER </th><th>REPORT</th></tr><tr>";
		if (empty($this->aie)) $str .= "<td><span class='unread'>Not yet submitted</span></td>";
		else $str .= "<td>".CHtml::link($download." submitted</span>",Yii::app()->utility->downloadPrivateFileLink($directory,$this->aie))."</td>";
		
		if (empty($this->imprest_warrant)) $str .= "<td><span class='unread'>Not yet submitted</span></td>";
		else $str .= "<td>".CHtml::link($download." submitted</span>",Yii::app()->utility->downloadPrivateFileLink($directory,$this->imprest_warrant))."</td>";
		
		if (empty($this->imprest_surrender)) $str .= "<td><span class='unread'>Not yet submitted</span></td>";
		else $str .= "<td>".CHtml::link($download." submitted</span>",Yii::app()->utility->downloadPrivateFileLink($directory,$this->imprest_surrender))."</td>";
		
		if (empty($this->report)) $str .= "<td><span class='unread'>Not yet submitted</span></td>";
		else $str .= "<td>".CHtml::link($download." submitted</span>",Yii::app()->utility->downloadPrivateFileLink($directory,$this->report))."</td>";
	
		return $str."</tr>
		<tr><td colspan='4'>".
		CHtml::link($submit,array('surrender','token'=>md5(Yii::app()->user->id),'mdfgdWERT123456TY122' => $this->id))."</td>
		</tr>
		</table>";
	}
	public function user($option){
		$option = $option."User";
		return $this->$option;
	}
	public function decision($option){
		$d =  $option."_approval_status";
		$d =  $this->$d;
		$r =  $option."_approval_remarks";
		$r = $this->$r;
		if (!empty($r)) $r = " (".$r.")";
		if ($d==1) $d = "<span class='read'>Approved</span>";
		if ($d==2) $d = "<span class='unread'>Rejected</span>";
		return $d.$r;
	}
	public function dates($option){
		$option = $option."_approval_date";
		return $this->$option;
	}
	public function existing(){
		if (!empty($this->id)) return ResearchGrantClaim::model()->exists('staff_id=? AND date_requested=? AND amount_requested=? AND id!='.$this->id,array($this->staff_id,$this->date_requested,$this->amount_requested));
		return ResearchGrantClaim::model()->exists('staff_id=? AND date_requested=? AND amount_requested=?',array($this->staff_id,$this->date_requested,$this->amount_requested));
	}
}
