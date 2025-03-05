<?php
Yii::import('application.modules.pm.models.*');
Yii::import('application.modules.hr.models.*');
class IctServiceRequestController extends GxController {


	
public function filters() {
	return array(
				'accessControl', 
				);
	}

	public function accessRules() {
		return array(
				array('allow', 
					'actions'=>array('submit','update','admin','view','close','comment','searchOffice'),
					'roles'=>array(9999),
					),
				array('allow', 
					'actions'=>array('suggestion'),
					'users'=>array('*'),
					),
				array('deny', 
				'users'=>array('*'),
				),
		);
	}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'IctServiceRequest'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'IctServiceRequest'),
			));
	}
	public function actionSubmit() {
		$model = new IctServiceRequest;
		$model->user_id = Yii::app()->user->id;
		$staff = $this->loadModel(Yii::app()->user->id, 'Employee');
		$this->pageTitle .= " - Submit Service Request Ticket";
		if (isset($_POST['IctServiceRequest'])) {
			$model->setAttributes($_POST['IctServiceRequest']);		
			$model->status = 0;
			if ($model->save()) {
				$activity = new UserActivity();
				$activity->agent = "staff with ID : ".Yii::app()->user->id;
				$activity->category = 4;
				$activity->theuser = $model->id;
				$activity->user_cat =4;
				$activity->details = " submitted request ticket";
				$activity->date_recorded = time();
				$activity->save();
				//get email addresses
				$admin = $this->loadModel(8, 'User');
				$emails[] = $admin->email;
				$users = User::model()->findAll('role_id=22');
				for($i=0;$i<count($users);$i++){
					$emails[] = $users[$i]->email;
				}	
				//alert support teams
				$message = $staff->names()." has sent a service request concerning ".$model->type." in ".$model->office.".<br /><br/>". 
				"The problem is described as <b>".$model->description."</b>.<br/><br/>
				Kindly assign  one of the support team immediately.";
				$subject = "ICT Service Request of Ticket Number: ".$model->id;							
				EmailNotification::record('ICTServiceRequest',$model->id,User::userCategory('staff'),0,$admin->email,$subject,$message);
				$contact = EmployeeContact::model()->find("pf_number='".$staff->pf_number."'");
				$subject = "ICT Service Request of Ticket Number: ".$model->id;
				$message = "Dear ".$staff->names().",<br/><br/>
				We have received your service request concerning ".$model->type." in ".$model->office.".<br /><br/>". 
				"You have described the problem as <b>".$model->description."</b>.<br/><br/>
				You will be served as soon as any of our Support Team becomes available.";
				if (!empty($contact->email))
				EmailNotification::record("ICTServiceRequest",$contact->id,User::userCategory('staff'),0,$contact->email,$subject,$message);

				Yii::app()->user->setFlash('success', '<b>Thank you! Your service ticket has been submitted successfully. You will be served as soon as any of our Support Team becomes available.</b> ');
				$this->redirect(array('view', 'id' => $model->id));
			}
			
			$activity = new UserActivity();
			$activity->agent = "staff with ID : ".Yii::app()->user->id;
			$activity->category = 11;
			$activity->theuser = $model->id;
			$activity->user_cat =4;
			$activity->details = " error while submitting request ticket";
			$activity->date_recorded = time();
			$activity->save();
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('create',array( 'model' => $model, 'staff' => $staff));
		else
			$this->renderPartial('create', array( 'model' => $model, 'staff' => $staff));
	}

	public function actionSuggestion() {
		$model = new IctComment;
		
		$session=new CHttpSession;
		
		
		$this->pageTitle = "Submit Compliment/ Complaint to the Directorate of ICT Services ". $this->pageTitle;
		 
		
		if (isset($_POST['IctComment'])) {
			
			$model->setAttributes($_POST['IctComment']);
			$model->type_id = $_POST['type_id'];
			$model->status = 0;
			$model->date_received = time();
			 if(!empty(Yii::app()->user->id)){
		 	
			 $e = $this->loadModel(Yii::app()->user->id, 'Employee');
			 $model->name = $e->pf_number;
		 	}
		 

			if (empty($_POST['type_id'])){
				
				Yii::app()->user->setFlash('error', 'You must state whether you are submitting either a compliment or a complaint ');
				
			}  
			 
			else if ($session['answer'] != $model->verifyCode){
				
				Yii::app()->user->setFlash('error', 'The answer given is not correct, please try again. ');
				
			}
		

			else if ($model->save()) {
				
				if ($_POST['type_id']==1) Yii::app()->user->setFlash('success', '<b>Thank you! Your compliment to the Directorate of ICT Services has been received.</b>');
				else Yii::app()->user->setFlash('success', '<b>Thank you! Your complaint to the Directorate of ICT Services has been received and will be attended to soon.</b>');
				$this->redirect(array('//portal/profile/home'));
			}
			
			
		}

		//random question
		$numbers = array(0=>1,1=>2,2=>3,3=>4,4=>5,5=>6,6=>7,7=>8,8=>9);
		$sign = array(0=>'plus',1=>'minus',2=>'times',3=>'divide by');
		//generate spam cpature
		$n1 = $numbers[rand(0,8)];
		$s = $sign[rand(0,3)];
		$n2 = $numbers[rand(0,8)];
		//answer
		switch ($s) {
			case 0:
				$a = $n1 + $n2;
				$a1 = $n1.' plus '. $n2;
				break;
			case 1:
				$a = $n1 - $n2;
				$a1 = $n1.' minus '.$n2;
				break;
			case 2:
				$a = $n1 * $n2;
				$a1 = $n1.' times '. $n2;
				break;
				
			case 3:
				$a = $n1 / $n2;
				$a1 = $n1 .' divide by '. $n2;
				break;
						
			default:
				
				break;
		}
		
		$capture = '<span class="unread bold">'.$a1.' = </span>';
		
		$session['answer'] = $a; 
		$this->render('suggestion', array( 'model' => $model,'capture'=>$capture));
		
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IctServiceRequest');

		$model->user_id = Yii::app()->user->id;
		$staff = $this->loadModel(Yii::app()->user->id, 'Employee');


		if (isset($_POST['IctServiceRequest'])) {
			$model->setAttributes($_POST['IctServiceRequest']);

			if ($model->save()) {
				
				$activity = new UserActivity();
				$activity->agent = "staff with ID : ".Yii::app()->user->id;
				$activity->category = 5;
				$activity->theuser = $model->id;
				$activity->user_cat =4;
				$activity->details = " updated request ticket";
				$activity->date_recorded = time();
				$activity->save();
				
				Yii::app()->user->setFlash('success', 'Thank you! Your service ticket has been updated . You will be served as soon as any of our Support Team member becomes available. ');
				
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('update', array(
				'model' => $model,
				'staff' => $staff,
				));
		else
			$this->renderPartial('update', array(
				'model' => $model,
				'staff' => $staff,
				));
	}

	public function actionClose($id) {
		
		
			$ticket = $this->loadModel($id, 'IctServiceRequest');
			$ticket->status = 3;
			$ticket->save();
			$activity = new UserActivity();
			$activity->agent = "staff with ID : ".Yii::app()->user->id;
			$activity->category = 5;
			$activity->theuser = Yii::app()->user->id;
			$activity->user_cat =4;
			$activity->details = " closed request ticket";
			$activity->date_recorded = time();
			$activity->save();
			
			Yii::app()->user->setFlash('warning', '<h5>Your service ticket has been now closed. We believe your request has now been solved.</h5>');
	
			$this->redirect(array('view', 'id' => $id));
			
	}
	public function actionComment($id) {
		
		$model = $this->loadModel($id, 'IctServiceRequest');
		$action = new IctServiceRequestAction;

		if (isset($_POST['IctServiceRequestAction'])) {
			
			$action->setAttributes($_POST['IctServiceRequestAction']);
			
			$action->status =4; //staff
			$action->service_id = $id;
			$action->user_id = Yii::app()->user->id;
			$action->assigned = Yii::app()->user->id;
			
			if ($action->save()) {
				
				$activity = new UserActivity();
				$activity->agent = "user : ID ".Yii::app()->user->id;
				$activity->category = 4;
				$activity->theuser = Yii::app()->user->id;
				$activity->user_cat = 1;
				$activity->details = "commented on  ticket number ID : ".$id;
				$activity->date_recorded = time();
				$activity->save();
				//$model->assigned = Yii::app()->user->id;
				$model->save();
				
				Yii::app()->user->setFlash('success', "Your comment has been submitted successfully.");
				
				$this->redirect(array('view', 'id' => $model->id));
			}
			echo CHtml::errorSummary($action);exit;
		}
		
		$this->render('comment', array(
				'model' => $model,
				'action' => $action,
				));
		
	}
	public function actionSearchOffice() {
		
		  if (isset($_GET['term'])) {
		  
			$criteria=new CDbCriteria;
			
			$criteria->condition = 
			"lower(name) like '%" . strtolower($_GET['term']) . "%'";
				
		
			$dataProvider=new CActiveDataProvider('Office', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100)));
	
			$data = $dataProvider->getData();
	
			$return_array = array();
			foreach($data as $d) {
			
				$return_array[] = array(
							'label'=>strip_tags($d->name),
							'value'=>strip_tags($d->name),
							'id'=>$d->id,
							);
			}
	
			echo CJSON::encode($return_array);
		  }
	}

	public function actionIndex() {
		$model = new IctServiceRequest('search');
		$model->unsetAttributes();

		if (isset($_GET['IctServiceRequest']))
			$model->setAttributes($_GET['IctServiceRequest']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		
		$staff = $this->loadModel(Yii::app()->user->id, 'Employee');
		//check if changed password
		if(empty($staff->password)){
			Yii::app()->user->setFlash('warning', "<h3>Kindly set your password before you continue.</h3>");
			$this->redirect(Yii::app()->createUrl('//portal/profile/password'));
		}
		
		$model = new IctServiceRequest('search');
		$model->unsetAttributes();

		if (isset($_GET['IctServiceRequest']))
			$model->setAttributes($_GET['IctServiceRequest']);

		$this->render('admin', array(
			'model' => $model,
			'staff' => $staff,
		));
	}

}
