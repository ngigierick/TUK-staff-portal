<?php

class EmployeeCourseController extends GxController {

public $layout='//layouts/portal';
public $pageTitle = ":: Staff ePortal";	
	
public function filters() {
	return array(
				'accessControl', 
				);
	}

	public function accessRules() {
		return array(
				array('allow', 
					'actions'=>array('create','update','delete'),
					'roles'=>array(9999),
					),
				array('deny', 
				'users'=>array('*'),
				),
		);
	}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'EmployeeCourse'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'EmployeeCourse'),
			));
	}

	public function actionCreate() {
			
		$id = Yii::app()->user->id;
		
		$staff = $this->loadModel($id, 'Employee');
				
		
		//check if staff already existing
		if(empty($staff->id)){
			
			
					
			Yii::app()->user->setFlash('error', '<b>No stafff found associated with the number.</b>');
			$this->redirect(Yii::app()->createUrl('//portal/profile/view'));
		}
		
		$model = new EmployeeCourse;


		if (isset($_POST['EmployeeCourse'])) {
			$model->setAttributes($_POST['EmployeeCourse']);
			
			if(!empty($model->currently_on)) $model->ending_date = "TO-DATE";
			//$model->home=$model->country;
		
						
				if ($model->save()) {
					$session=new CHttpSession;
					$session->open();
					$session['page'] = 9;
				
					
					 if (Yii::app()->request->isAjaxRequest)
	                 {
	                    echo CJSON::encode(array(
	                        'status'=>'success', 
	                        'div'=>" course taught details updated successfully!"
	                        ));
	                    exit;               
	                 }
			
					 else{
					 	 
						Yii::app()->user->setFlash('success', '<b>New course taught details added successfully!</b>');
						$this->redirect(Yii::app()->createUrl('//portal/profile/view'));
					 }
				
			}
				
			}
		
		if (Yii::app()->request->isAjaxRequest)
        {
            echo CJSON::encode(array(
                'status'=>'failure', 
                'div'=>$this->renderPartial('create', array('model'=>$model,'staff'=>$staff), true)));
            exit;               
        }
		$this->render('create', array( 'model' => $model,'staff'=>$staff));
		
	}

	public function actionUpdate($id) {
	
		$model = $this->loadModel($id, 'EmployeeCourse');

		$staff = $this->loadModel($model->pfNumber->id, 'Employee');
		
		if (isset($_POST['EmployeeCourse'])) {
			$model->setAttributes($_POST['EmployeeCourse']);

			if ($model->save()) {
			
				$session=new CHttpSession;
				$session->open();
				$session['page'] = 9;
					
				
				 if (Yii::app()->request->isAjaxRequest)
                 {
                    echo CJSON::encode(array(
                        'status'=>'success', 
                        'div'=>" course taught details updated successfully!"
                        ));
                    exit;               
                 }
		
				 else{
				 	 
					Yii::app()->user->setFlash('success', '<b>course taught details updated successfully!</b>');
					$this->redirect(Yii::app()->createUrl('//portal/profile/view'));
				 }
				
			}
		}
		if (Yii::app()->request->isAjaxRequest)
        {
            echo CJSON::encode(array(
                'status'=>'failure', 
                'div'=>$this->renderPartial('update', array('model'=>$model,'staff'=>$staff), true)));
            exit;               
        }
		$this->render('update', array( 'model' => $model,'staff'=>$staff));
	}

	
	public function actionDelete1($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'EmployeeCourse')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionDelete($id) {
		
		if ($this->loadModel($id, 'EmployeeCourse')->delete()){
			
			$session=new CHttpSession;
			$session->open();
			$session['page'] = 9;
			Yii::app()->user->setFlash('success', '<b>course taught deleted successfully!</b>');
			$this->redirect(Yii::app()->createUrl('//portal/profile/view'));
		}
		
			
	}


	public function actionIndex() {
		$model = new EmployeeCourse('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeCourse']))
			$model->setAttributes($_GET['EmployeeCourse']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new EmployeeCourse('search');
		$model->unsetAttributes();

		if (isset($_GET['EmployeeCourse']))
			$model->setAttributes($_GET['EmployeeCourse']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
