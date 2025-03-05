<?php

Yii::import('application.modules.portal.models._base.BaseResearchGrant');

class ResearchGrant extends BaseResearchGrant
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function myApplications() {
		$criteria = new CDbCriteria;
		$criteria->condition = 'staff_id='.Yii::app()->user->id;
		$criteria->order = 'id DESC';
		return ResearchGrant::model()->findAll($criteria);
	}
	public static function viewModel($token,$id){
		if (md5(Yii::app()->user->id)!=$token)
		{echo "<span class='unread'>Access violation encountered. Please contact the system administration for more assistance.</span>";exit;}
		return ResearchGrant::model()->findByPk($id);
	}
	public static function processModel($id=''){
		$model = new ResearchGrant;
		$message = 'new record';
		if (!empty($id)) $model = ResearchGrant::model()->findByPk($id);
		if (isset($_POST['ResearchGrant'])) {
			$model->setAttributes($_POST['ResearchGrant']);
			if ($model->existing()) {$message = "This record already exists"; Yii::app()->user->setFlash('error', 'A Research Grant with the same details already exists.');}
			else if ($model->save()){ 
				$message = '';
				$model->processUploads();
				$title = $model->title;
				Yii::app()->user->setFlash('success', 'Research Grant with title $title added!');
				if (!empty($id)) UserActivity::record('edit','Research Grant updated - '.$model->title.' ID- '.$model->id);
				else UserActivity::record('add','Added Research Grant - '.$model->title.' ID- '.$model->id);
			}
			else{ $message = CHtml::errorSummary($model); Yii::app()->user->setFlash('error', $message);}
		}
		$data['model'] = $model;
		$data['message'] = $message;
		return $data;
	}
	public static function processDisbursement($token,$id){
		if (md5(Yii::app()->user->id)!=$token)
		{echo "<span class='unread'>Access violation encountered. Please contact the system administration for more assistance.</span>";exit;}
		$grant = ResearchGrant::model()->findByPk($id);
		$message = 'new record';
		$model = new ResearchGrantClaim;
		$model->grant_id = $id;
		$model->type_id = $grant->currentType();
		if ($grant->pendingSurrender()){
			$message = ""; 
			Yii::app()->user->setFlash('error', 'Kindly submit surrender documents for the previous funds disbursement before you make a request for another disbursement of funds.');
			$data['model'] = $model;
			$data['message'] = $message;
			return $data;
		}
		if (isset($_POST['ResearchGrantClaim'])) {
			$model->setAttributes($_POST['ResearchGrantClaim']);
			if ($model->existing()) {$message = "This record already exists"; Yii::app()->user->setFlash('error', 'You have submitted this Disbursement Request or another Request is still pending.');}
			else if ($model->save()){ 
				$message = '';
				Yii::app()->user->setFlash('success', 'Disbursement request submitted successfully!');
				UserActivity::record('add','Submitted a Disbursement request - '.$model->date_requested.' ID- '.$model->id);
			}
			else{ $message = CHtml::errorSummary($model); Yii::app()->user->setFlash('error', $message);}
		}
		$data['model'] = $model;
		$data['message'] = $message;
		return $data;
	}
	public function processUploads(){
		$model = ResearchGrant::model()->findByPk($this->id);
		$directory = ResearchGrant::uploadDirectory();
		if (isset($model->id)){
			$this->letter = $model->letter;
			$this->proposal = $model->proposal;
			$this->ethics_approval = $model->ethics_approval;
			$this->nacosti_permit = $model->nacosti_permit;
			$this->indemnity_deed = $model->indemnity_deed;
		}
		if($file=CUploadedFile::getInstance($this,'letter'))
        {
			$rnd = rand(0,9999);
			$fileName = $rnd."_".$file;  
			if (!empty($file)){
				$this->letter = $fileName;
				$old = $directory.$fileName;
				if (file_exists($old)) unlink($old);			
				$file->saveAs($directory.$fileName);
			}
			
        }
		if($file=CUploadedFile::getInstance($this,'proposal'))
        {
			$rnd = rand(0,9999);
			$fileName = $rnd."_".$file;  
			if (!empty($file)){
				$this->proposal = $fileName;
				$old = $directory.$fileName;
				if (file_exists($old)) unlink($old);			
				$file->saveAs($directory.$fileName);
			}
			
        }
		if($file=CUploadedFile::getInstance($this,'ethics_approval'))
        {
			$rnd = rand(0,9999);
			$fileName = $rnd."_".$file;  
			if (!empty($file)){
				$this->ethics_approval = $fileName;
				$old = $directory.$fileName;
				if (file_exists($old)) unlink($old);			
				$file->saveAs($directory.$fileName);
			}
        }
		if($file=CUploadedFile::getInstance($this,'nacosti_permit'))
        {
			$rnd = rand(0,9999);
			$fileName = $rnd."_".$file;  
			if (!empty($file)){
				$this->nacosti_permit = $fileName;
				$old = $directory.$fileName;
				if (file_exists($old)) unlink($old);			
				$file->saveAs($directory.$fileName);
			}
        }
		if($file=CUploadedFile::getInstance($this,'indemnity_deed'))
        {
			$rnd = rand(0,9999);
			$fileName = $rnd."_".$file;  
			if (!empty($file)){
				$this->indemnity_deed = $fileName;
				$old = $directory.$fileName;
				if (file_exists($old)) unlink($old);			
				$file->saveAs($directory.$fileName);
			}
        }
		$this->save();
	}
	public function attachments(){
		$str = '';
		$download = " <span class='btn btn-small btn-info'>";
		$directory = ResearchGrant::viewDirectory();
		if (!empty($this->letter)) 
			$str .= CHtml::link($download." Award Letter</span>",Yii::app()->utility->downloadPrivateFileLink($directory,$this->letter));
		if (!empty($this->proposal)) 
			$str .= CHtml::link($download." Proposal</span>",Yii::app()->utility->downloadPrivateFileLink($directory,$this->proposal));
		if (!empty($this->ethics_approval)) 
			$str .= CHtml::link($download." Ethics Approval</span>",Yii::app()->utility->downloadPrivateFileLink($directory,$this->ethics_approval));
		if (!empty($this->nacosti_permit)) 
			$str .= CHtml::link($download." NACOSTI Permit</span>",Yii::app()->utility->downloadPrivateFileLink($directory,$this->nacosti_permit));
		if (!empty($this->indemnity_deed)) 
			$str .= CHtml::link($download." Indemnity Deed</span>",Yii::app()->utility->downloadPrivateFileLink($directory,$this->indemnity_deed));
		return $str;
	}
	public function disbursements(){
		return ResearchGrantClaim::model()->findAll('grant_id='.$this->id);		
	}
	public function pendingSurrender(){
		return  ResearchGrantClaim::model()->exists('grant_id='.$this->id.' AND (report is null OR aie is null OR imprest_warrant is null OR imprest_surrender is null)');
	}
	public function existing(){
		if (!empty($this->id)) return ResearchGrant::model()->exists('LOWER(title)=? AND id!='.$this->id,array(strtolower($this->title)));
		return ResearchGrant::model()->exists('LOWER(title)=?',array(strtolower($this->title)));
	}
	public function currentType(){
		return ResearchGrantClaim::model()->count('grant_id='.$this->id);
	}
	public static function uploadDirectory(){
		if (SiteConfig::testMode()=='local')
			return Yii::app()->basePath.'/../images/passports/';
		return Yii::app()->basePath.'/../../media/staff/research/';
	}
	public static function viewDirectory(){
		if (SiteConfig::testMode()=='local')
			return Yii::app()->basePath.'/../images/passports/';
		return 'staff/research/';
	}
}
