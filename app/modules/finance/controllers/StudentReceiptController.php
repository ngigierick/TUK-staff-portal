<?php
Yii::import('application.modules.admission.models.*');
Yii::import('application.modules.setup.models.*');
class StudentReceiptController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin','index','view','print','minicreate', 'create','update','pay'),
				'roles'=>array(2),
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

	public function actionView($id) {
		$this->render('receiptview', array(
			'model' => $this->loadModel($id, 'StudentReceipt'),
		));
	}
	public function actionPrint($id)
	{
	
		$where = "id='".$id."'";
		$model=new CActiveDataProvider('StudentReceipt', array(
										'criteria'=>array(
											'condition'=>$where,
										),
										'pagination'=>array(
										'pageSize'=>1000,
				),
		));
		$this->render('receiptview',array('receipt'=>$model,'model' => $this->loadModel($id, 'StudentReceipt')));
	}
	public function actionCreate($reg_number) {
		
		$student = Student::model()->find('reg_number=:reg', array(':reg'=>$reg_number));
		
		if(!empty($student))
		{
			
			$this->render('create', array( 'model' => $model));
		}
		else if (isset($_POST['StudentReceipt'])) {
		
			$model->setAttributes($_POST['StudentReceipt']);
			if ($model->save()) {
					$this->redirect(array('view', 'id' => $model->id));
			}
		
		}
		else{
		
			$message ="<b>Student Receipting Failed!</b><br/>The student to be receipted can not be found";
			Yii::app()->user->setFlash('error', $message);
			$this->redirect(array('pay'));
		}
		
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'StudentReceipt');

		$this->performAjaxValidation($model, 'student-receipt-form');

		if (isset($_POST['StudentReceipt'])) {
			$model->setAttributes($_POST['StudentReceipt']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'StudentReceipt')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('StudentReceipt');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new StudentReceipt('search');
		$model->unsetAttributes();

		if (isset($_GET['StudentReceipt']))
			$model->setAttributes($_GET['StudentReceipt']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionPay()
	{
	
		$model = new StudentReceipt;
		if (isset($_POST['StudentReceipt']))
		{
			$model->setAttributes($_POST['StudentReceipt']);
			$student = Student::model()->find('reg_number=:reg', array(':reg'=>$model->student_reg));
			
			if(!isset($_POST['stud'])){
				
			
				if (!$model->validate()) {
							$err = CHtml::errorSummary($model);
							Yii::app()->user->setFlash('error', "Operation failed!<br/> ".$err);
				}
				else{
						$criteria = new CDbCriteria;
						$criteria->select='MAX(id) as receiptnumber';
						$receipt=StudentReceipt::model()->find($criteria);
						$recptno = dechex( $receipt->receiptnumber++ );
						$recptno = str_pad( $recptno, 10, "0", STR_PAD_LEFT );
						$recptno = 'F'.$recptno;
						$model->receiptnumber = $recptno;
						
						if ($model->save()){
						
							Yii::app()->user->setFlash('success', "Payment Receipt Successful!<br/> ".$student->title.' '.$student->surname.' '.$student->firstname.' '.$student->othername." has been credited with ".$model->amount." and a receipt has been generated ".$model->receiptnumber);
							$this->actionPrint($model->id);
							exit;
						}
						else{
						
							Yii::app()->user->setFlash('error', "Operation failed!<br/> Please contact the administrator for assistance");
						}
				}
			}
			$this->render('create', array( 'model' => $model,'student'=>$student));
			
			
		}
			

		else $this->render('search_student', array(
			'model' => $model,
		));
	
	
	}
	
	

}