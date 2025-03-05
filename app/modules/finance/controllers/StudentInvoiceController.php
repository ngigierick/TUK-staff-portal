<?php
Yii::import('application.modules.admission.models.*');
Yii::import('application.modules.setup.models.*');
class StudentInvoiceController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('view','index','admin','minicreate', 'create','update','invoiceStudent'),
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

	public function actionView($id) 
	{
	
		$model = $this->loadModel($id, 'StudentInvoice');
		$dataArray = $this->actionFeeArray($model->invoice_array,1);
		//$feeitems->setData( $dataArray ); 
		
		$this->render('view', array(
			'model' => $model,
			'feeitems'=>$dataArray,
		));
	}
	
	public function actionFeeArray( $feearray, $st='' )
	{
		$feearray = unserialize($feearray);
		//print_r($feearray); exit;
		$feeitems  = new CActiveDataProvider('FeePayable', array('pagination'=>array('pageSize'=>100)));
		for($i=0;$i<$feeitems->totalItemCount;$i++){
			if(($feearray[$i] !=0) && (empty($st))){
				$dataArray[$i]['amount'] = $feearray[$i];
				$dataArray[$i]['name'] = $feeitems->data[$i]->name;
			}
			else{
				$dataArray[$i]['amount'] = $feearray[$i];
				$dataArray[$i]['name'] = $feeitems->data[$i]->name;
			}
			
		}
		return $dataArray;
	}

	public function actionCreate() {
		$model = new StudentInvoice;
		$feeitems  = new CActiveDataProvider('FeePayable', array('pagination'=>array('pageSize'=>100)));
		$this->performAjaxValidation($model, 'student-invoice-form');
		$error='';
		if (isset($_POST['StudentInvoice'])) {
			$model->setAttributes($_POST['StudentInvoice']);
			//capture post data
			$programme_code = $_POST['programme_code']; 
			$semester = $model->semester_id;
			$module = $_POST['module_id']; 
			$feearray = $_POST['amount'];
			$feearray[0] = 0;
			$feearray = serialize($feearray); 
			//$model->invoice_array = serialize($feearray);
			$model->reg_number = 'sss';//hack
			if(empty($module)){
				$error .= "<br/>Please select the module type for the invoice";
			}
			else if(empty($programme_code)){
				$error .= "<br/>Please select the programme/ course for the invoice";
			}
			else if ($model->validate()){
			
				//get all students  associated with the programme 
				$criteria=new CDbCriteria;
				$criteria->condition='programme_id=:code';
				$criteria->params=array(':code'=>$programme_code);
				$dataProvider=new CActiveDataProvider('Student', array(
											'criteria'=>$criteria,
											'pagination'=>array(
											'pageSize'=>100000,
					),
				));
				if($dataProvider->getItemCount()<1){
					$error .="<br/>Sorry, no student found associated with that course/ programme!";
				}
				else{
					
					$warning = "<b>Invoice Generation Warning!</b><br/>The following students were already invoiced and hence have been ignored.<br/> To update, select the course and update fees.<br/>";
					$warn = false;
					
					for($i=0;$i<$dataProvider->totalItemCount;$i++){
					
						$regnumber = $dataProvider->data[$i]->reg_number;
						if (StudentInvoice::model()->exists('reg_number=:reg AND semester_id=:sem', array(':reg'=>$regnumber,':sem'=>$semester))){
							$warning .= $dataProvider->data[$i]->title.' '.$dataProvider->data[$i]->surname.' '.$dataProvider->data[$i]->firstname.' '.$dataProvider->data[$i]->othername.' ('.$dataProvider->data[$i]->reg_number.')<br/>';
							$warn = true;
						}
						else{
							
							$invoice = new StudentInvoice;
							$invoice->reg_number = $regnumber;
							$invoice->semester_id = $semester;
							$invoice->invoice_array = $feearray;
							$invoice->save();
						}
					
					}
					
					if($warn){
						Yii::app()->user->setFlash('warning', $warning);
					}
					else{
					
						//redirect to successfulpage
						$message ="<b>Invoice Generation Successful!</b><br/>The following students have been invoiced.<br/>";
						Yii::app()->user->setFlash('success', $message);
					}
					$this->render('successful_invoice', array( 'dataProvider' => $dataProvider));
					exit;
					
				}
			}
			
			if (!empty($error)){
				$error = '<b>Invoice Generation Error!</b>'.$error; 
				Yii::app()->user->setFlash('error', $error);
				
			}
		}
		$this->render('create', array( 'model' => $model,'feeitems'=>$feeitems));
	}

	public function actionUpdate($id) {
	
		$model = $this->loadModel($id, 'StudentInvoice');
		$dataArray = $this->actionFeeArray($model->invoice_array);
		$this->performAjaxValidation($model, 'student-invoice-form');
		$invoice = new StudentInvoice;
		
		//process update
		$error='';
		if (isset($_POST['programme_code'])) {

			//capture post data
			$programme_code = $_POST['programme_code']; 
			$semester = $_POST['semester_id']; 
			$feearray = $_POST['amount'];
			$feearray[0] = 0;
			$feearray = serialize($feearray); 
		
			$error = '';
			if(empty($id)){
				$error .= "<br/>No invoice associated with the data submitted";
			}
			else if(empty($programme_code)){
				$error .= "<br/>Please select the programme/ course for the invoice";
			}
			else if ($model->validate()){
			
				//get all students  associated with the programme 
				$criteria=new CDbCriteria;
				$criteria->condition='programme_id=:code';
				$criteria->params=array(':code'=>$programme_code);
				$dataProvider=new CActiveDataProvider('Student', array(
											'criteria'=>$criteria,
											'pagination'=>array(
											'pageSize'=>100000,
					),
				));
				if($dataProvider->getItemCount()<1){
					$error .="<br/>Sorry, no student found associated with that course/ programme!";
				}
				else{
					
					
					for($i=0;$i<$dataProvider->totalItemCount;$i++){
					
						$invoice2 = new StudentInvoice;
						$reg_number = $dataProvider->data[$i]->reg_number;
						$invoice2 = StudentInvoice::model()->find('reg_number=:reg AND semester_id=:sem', array(':reg'=>$reg_number,':sem'=>$semester));
						$invoice2->semester_id = $semester;
						$invoice2->invoice_array = $feearray;
						$invoice2->save();
						
					}
					
						//redirect to successfulpage
					$message ="<b>Invoice Upadte Successful!</b><br/>The following students invoices have been updated.<br/>";
					Yii::app()->user->setFlash('success', $message);
					$this->render('successful_invoice', array( 'dataProvider' => $dataProvider));
					
					
				}
			}
			
			if (!empty($error)){
				$error = '<b>Invoice Generation Error!</b>'.$error; 
				Yii::app()->user->setFlash('error', $error);
				
			}
		}
		else $this->render('update', array( 'model' => $model,'feeitems'=>$dataArray));
	}
	
	public function actionInvoiceStudent()
	{
		$model = new StudentInvoice;
		$invoice = new StudentInvoice;
		$feeitems  = new CActiveDataProvider('FeePayable', array('pagination'=>array('pageSize'=>100)));
	
		$error='';
		
		
		//update invoice for a student
		if(isset($_POST['save-invoice']))
		{
			$feearray = $_POST['amount'];
			$feearray[0] = 0;
			$feearray = serialize($feearray); 
			$reg_number = $_POST['reg_number'];
			$semester_id = $_POST['semester_id'];
			$invoice = StudentInvoice::model()->find('reg_number=:reg AND semester_id=:sem', array(':reg'=>$reg_number,':sem'=>$semester_id));
			if(empty($invoice))
			{
				$invoice = new StudentInvoice;
				$invoice->invoice_array = $feearray;
				$invoice->reg_number = $reg_number;
				$invoice->semester_id = $semester_id;
				$invoice->save();
				$message ="<b>Invoice Generation Successful!</b>The invoice has been generated successfully";
				Yii::app()->user->setFlash('success', $message);
				$this->redirect(array('view', 'id' => $invoice->id));
			}
			else{
			
				$invoice->invoice_array = $feearray;
				$invoice->save();
				$message ="<b>Invoice Upadte Successful!</b><br/>Invoice for ".$invoice->reg_number.' : '.$invoice->regNumber->title.' '.$invoice->regNumber->surname.' '.$invoice->regNumber->firstname.' '.$invoice->regNumber->othername.' '.$invoice->semester.' has been updated successfully';
				Yii::app()->user->setFlash('success', $message);
				$this->redirect(array('view', 'id' => $invoice->id));
			}
			
			
		
		
		}
		else if (isset($_POST['StudentInvoice'])) {
			
			//get existing invoice details
			$model->setAttributes($_POST['StudentInvoice']);
			//echo $model->reg_number.$model->semester_id; exit;
			$invoice = StudentInvoice::model()->find('reg_number=:reg AND semester_id=:sem', array(':reg'=>$model->reg_number,':sem'=>$model->semester_id));
			//	
			
			$error = '';
			if(empty($invoice)){
			
				$error .= "<br/>The student has not been invoiced this semester. All new fee items will be set";
				$error = '<b>Invoice Generation Waring!</b>'.$error; 
				Yii::app()->user->setFlash('danger', $error);
				$this->render('student_invoice', array( 'model' => $model,'fees'=>$feeitems));
				
			}
			else{
			
				$dataArray = $this->actionFeeArray($invoice->invoice_array);
				$error .= "<br/>The student has been invoiced this semester, you will only update the required fee items.";
				$error = '<b>Invoice Generation Warning!</b>'.$error; 
				Yii::app()->user->setFlash('warning', $error);
				$this->render('student_invoice', array( 'model' => $model,'feeitems'=>$dataArray));
				
			}
			
			
		}
		else $this->render('search_student', array( 'model' => $model));
	
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'StudentInvoice')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('StudentInvoice', array('pagination'=>array('pageSize'=>100)));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new StudentInvoice('search');
		$model->unsetAttributes();

		if (isset($_GET['StudentInvoice']))
			$model->setAttributes($_GET['StudentInvoice']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}