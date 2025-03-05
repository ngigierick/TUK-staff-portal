<?php
Yii::import('application.modules.help.models.*');
class ProjectController extends GxController
{
		
		
	public function filters() {
		return array(
				'accessControl', 
				);
	}
	
	public function accessRules() {
	
		return array(
				array('allow',
					'actions'=>array(
					'phases',
					'view',
					'activities',
					'allModules',
					'completedModules',
					'ongoingModules',
					'projectedModules',
					'tusoftInro',
					),
					'roles'=>array(1,22),
					),
				array('allow',
					'actions'=>array('delete'),
					'roles'=>array(1),
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}

	public function actionPhases()
	{
		$model = new ProjectPhase('search');
		$model->unsetAttributes();

		if (isset($_GET['ProjectPhase']))
			$model->setAttributes($_GET['ProjectPhase']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionView($id) {
		
			$this->render('view', array(
				'model' => $this->loadModel($id, 'ProjectPhase'),
			));
		
	}
	
	public function actionActivities()
	{
		$model = new ProjectActivity('search');
		$model->unsetAttributes();

		if (isset($_GET['ProjectActivity']))
			$model->setAttributes($_GET['ProjectActivity']);

		$this->render('activities', array(
			'model' => $model,
		));
	}
	public function actionAllModules()
	{
		$modules=ProjectModule::model()->findAll();
		$this->actionModules( $modules, "All System Modules",0 );
	}
	public function actionCompletedModules()
	{
		$modules=ProjectModule::model()->findAll('completion_stage=100');
		$this->actionModules( $modules, "Completed Modules",1 );
	}
	
	public function actionOngoingModules()
	{
		$modules=ProjectModule::model()->findAll('completion_stage<100 AND completion_stage>0');
		$this->actionModules( $modules, "Ongoing Modules",2 );
	}
	
	public function actionProjectedModules()
	{
		$modules=ProjectModule::model()->findAll('completion_stage=0');
		$this->actionModules( $modules, "Projected Modules",3 );
	}
	
	public function actionModules( $modules,$header,$st )
	{
		$names = array();
		$status = array();
		$difference = array();
		$now = time();
		
		for($i=0;$i<count($modules);$i++){
			
			$names[] 	= $modules[$i]->name;
			
			$stage 	= $modules[$i]->completion_stage;
			
			if($stage==100) $status[] = "<span class='btn btn-success btn-small'><i class='icon-ok'></i>&nbsp;&nbsp;".$stage." % Done</span>";
			else if(($stage>=50)&&($stage<100)) $status[] = "<span class='btn btn-warning btn-small'><i class='icon-upload'></i>&nbsp;&nbsp;".$stage." % Done</span>";
			else $status[] = "<span class='btn btn-danger btn-small'><i class='icon-flag'></i>&nbsp;&nbsp;".$stage." % Done</span>";
			
			if($st==0){
				
				$end 		= $modules[$i]->end_date;
				$sec_diff 	= $now - strtotime($end);
				$dy_diff 	= floor($sec_diff/36000/24);
				$difference[] = "Completed in ".$dy_diff.' days ago';
			}
			if($st==1){
				
				$end 		= $modules[$i]->end_date;
				$sec_diff 	= $now - strtotime($end);
				$dy_diff 	= floor($sec_diff/36000/24);
				$difference[] = "Completed in ".$dy_diff.' days ago';
			}
			if($st==2){
				
				$end 		= $modules[$i]->end_date;
				$sec_diff 	= strtotime($end) - $now;
				$dy_diff 	= floor($sec_diff/36000/24);
				if ($dy_diff>0) $difference[] = "Ending in ".$dy_diff.' days';
				else $difference[] = "Expected to end ".(-1)*$dy_diff.' days ago';
			}
			if($st==3){
				
				$end 		= $modules[$i]->start_date;
				$sec_diff 	= strtotime($end) - $now;
				$dy_diff 	= floor($sec_diff/36000/24);
				$difference[] = "Starting in ".$dy_diff.' days';
			}
			
		}
		
		$this->render('modules/view', 
			array(
			'header' => $header,
			'modules' => $modules,
			'names' => $names,
			'status' => $status,
			'difference' => $difference,
			));
	}

	public function actionTusoftInro()
	{
		$this->pageTitle = 'About TuSOFT '.$this->pageTitle;
		
		$criteria=new CDbCriteria;
		$criteria->condition = "category_id = 2";
		$criteria->order='id ASC';
		$intro=new CActiveDataProvider('Documentation', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>1000)));
		
		$this->render('intro', array(
			'intro' => $intro,
		));
	}


}