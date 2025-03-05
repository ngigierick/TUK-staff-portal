<?php

Yii::import('application.modules.hr.models._base.BaseEmployeeDocument');

class EmployeeDocument extends BaseEmployeeDocument
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function submitAction($model_id,$action){
		$access = new EmployeeDocumentAction();
		$access->document_id = $model_id;
		$access->user_id = -1;
		$access->action_id = $action;
		$access->yr = date('Y');
		$access->mt = date('m');
		$access->dy = date('d');
		$access->staff = Yii::app()->user->id;
		$access->hr = date('H');
		$access->mn = date('i');
		$access->se = date('s');
		$access->date_modified = time();
		$access->save();
		if ($action==1){
			$details = "Added document id : ".$model_id;
			UserActivity::record("add",$details);
		} 
		if ($action==2){
			$details = "Updated document id : ".$model_id;
			UserActivity::record("edit",$details);
		} 
		if ($action==3){
			$details = "Viewed document id : ".$model_id;
			UserActivity::record("view",$details);
		} 
		if ($action==4){
			$details = "Downloaded document id : ".$model_id;
			UserActivity::record("view",$details);
		} 
		if ($action==5){
			$details = "Deleted document id : ".$model_id;
			UserActivity::record("delete",$details);
		} 
	}
}
