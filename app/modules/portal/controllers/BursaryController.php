<?php
Yii::import('application.modules.admission.models.*');
class BursaryController extends GxController {

	public $layout='//layouts/portal';
	public $pageTitle = ":: TUK Students Online Portal";
	
	

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'Bursary'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'Bursary'),
			));
	}
	public function actionPdf($id) {
		
		if(isset($_POST['pdf'])){
			$model = $this->loadModel($id, 'Bursary');
			$header = "Online Bursary Application";	
			$institution=Institution::model()->findByPk(1);
			$generator = date('F j, Y, g:i a',time());
			$mPDF1 = Yii::app()->ePdf->mpdf($header, 'A4');
			$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
			//$mPDF1->WriteHTML($stylesheet, 1);
			$mPDF1->WriteHTML(
				$this->renderPartial(
				
					'pdf',
					array(
						
						'model'=>$model,
						'institution'=>$institution->name,
						'generator'=>$generator,
					)
				,true));
				
			$mPDF1->Output();
		}
		else $this->render('view', array(
				'model' => $this->loadModel($id, 'Bursary'),
		));
	}

	public function actionApply() {
		
		$this->pageTitle = "Online Bursary Application ".$this->pageTitle;
		
		
		$model = new Bursary;
		$reg_number = Yii::app()->user->name;
		$student = Student::model()->find('reg_number=:reg', array(':reg'=>$reg_number));

		if (isset($_POST['Bursary'])) {
		
			$model->setAttributes($_POST['Bursary']);
			$bursary = Bursary::model()->find('reg_number=:reg', array(':reg'=>$model->reg_number));
			
			//if already applied
			if (isset($bursary->id)) $this->redirect(array('update', 'id' => $bursary->id));
			$model->full_name = strtoupper($model->full_name);
			$model->date_created = time();
			$model->date_modified = time();
			if (isset($_POST['bursary_beneficiary']))
			$model->bursary_beneficiary = 2;
			else $model->bursary_beneficiary = 1;
			if ($model->save()) {
			
				$this->redirect(array('pdf', 'id' => $model->id));
			}
		}
		$this->render('create', array( 'model' => $model,'student'=>$student));
		
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Bursary');


		if (isset($_POST['Bursary'])) {
			$model->setAttributes($_POST['Bursary']);
			$model->full_name = strtoupper($model->full_name);
			if ($model->save()) {
				$this->redirect(array('pdf', 'id' => $model->id));
			}
		}
		
		$this->render('update', array(
				'model' => $model,
				));
		
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Bursary')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Bursary('search');
		$model->unsetAttributes();

		if (isset($_GET['Bursary']))
			$model->setAttributes($_GET['Bursary']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new Bursary('search');
		$model->unsetAttributes();

		if (isset($_GET['Bursary']))
			$model->setAttributes($_GET['Bursary']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionAutocomplete () {
	  if (isset($_GET['term'])) {
	  
		$criteria=new CDbCriteria;
		
		$criteria->condition = "LOWER(name) like '%" . strtolower($_GET['term']) . "%'";
		
		$dataProvider=new CActiveDataProvider('Programme', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));

		$data = $dataProvider->getData();

		$return_array = array();
		foreach($data as $d) {
		  $return_array[] = array(
						'label'=>$d->name,
						'value'=>$d->name,
						'id'=>$d->code,
						);
		}

		echo CJSON::encode($return_array);
	  }
	}

}
