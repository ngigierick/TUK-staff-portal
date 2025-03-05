<?php
Yii::import('application.modules.intake.models.*');
class AcademicQualificationsController extends GxController {

	public $layout='//layouts/application';
	public $pageTitle = "Online Application for September 2014 Intake:: TUK Students Online Portal";
	
	public function filters() {
	return array(
			'accessControl', 
			);
	}

	public function accessRules() {
		return array(
				
				array('allow', 
					'actions'=>array(
					
						'add',
						
						
						
						),
					'roles'=>array(999),
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}

	/**
	* Add academic details
	*/
	public function actionAdd ($edit='')
	{
		//user id
		$id = Yii::app()->user->id;
		$app = PreApplicant::model()->findByPk($id);
		
		//query for personal details
		$model = Applicant::model()->find('LOWER(email)=?',array(strtolower($app->email)));
		
		//kcse subject array
		$kcse_subjects = KcseSubject::model()->findAll();
						
		$data = array();
		
		if (isset($_POST['submit_academic_qualifications'])){
			
			
			//KSCE or Equivalent
			$kcse_error=$cert_error=$dip_error=$h_dip_error=$deg_error = false;
			
			$k_error = "";
			$delete_kcse =false;
			$delete_olevel =false;
			$delete_cert =false;
			$delete_dip =false;
			$delete_h_dip =false;
			$delete_deg =false;
			
			if ((!empty($_POST['kcse_school'])) || (!empty($_POST['kcse_year'])) || (!empty($_POST['kcse_mean-grade']))){
				$k_error .= "<b>Error encountered while setting KCSE Qualifications</b><br/>";
				if (empty($_POST['kcse_school'])) {$k_error .= "-The school name must be provided";$kcse_error = true;}
				if (empty($_POST['kcse_year'])) {$k_error .= "-The year must be provided";$kcse_error = true;}
				if (empty($_POST['kcse_mean_grade'])) {$k_error .= "-The mean grade must be provided";$kcse_error = true;}
			
			}
			if ((empty($_POST['kcse_school'])) && (empty($_POST['kcse_year'])) && (empty($_POST['kcse_mean-grade']))) $delete_kcse =true;
			
			
			//o-level
			if ((!empty($_POST['olevel_name'])) || (!empty($_POST['cer_school'])) || (!empty($_POST['olevel_year'])) || (!empty($_POST['olevel_award']))){
				$k_error .= "<br/><b>Error encountered while setting KCSE Equivalent Qualifications</b><br/>";
				if (empty($_POST['olevel_name'])) {$k_error .= "-The examination body must be provided<br/>";$olevel_error = true;}
				if (empty($_POST['olevel_school'])) {$k_error .= "-The institution name must be provided<br/>";$olevel_error = true;}
				if (empty($_POST['olevel_year'])) {$k_error .= "-The year must be provided<br/>";$olevel_error = true;}
				if (empty($_POST['olevel_award'])) {$k_error .= "-The award must be provided<br/>";$olevel_error = true;}
			
			}
			if ((empty($_POST['olevel_school'])) && (empty($_POST['olevel_year'])) && (empty($_POST['olevel_award']))) $delete_olevel =true;
			
			//Certificate
			if ((!empty($_POST['cert_school'])) || (!empty($_POST['cert_year'])) || (!empty($_POST['cert_award']))){
				$k_error .= "<br/><b>Error encountered while setting Certificate Qualifications</b><br/>";
				if (empty($_POST['cert_school'])) {$k_error .= "-The institution name must be provided<br/>";$cert_error = true;}
				if (empty($_POST['cert_year'])) {$k_error .= "-The year must be provided<br/>";$cert_error = true;}
				if (empty($_POST['cert_award'])) {$k_error .= "-The award must be provided<br/>";$cert_error = true;}
			
			}
			if ((empty($_POST['cert_school'])) && (empty($_POST['cert_year'])) && (empty($_POST['cert_award']))) $delete_cert =true;
			
			//diploma
			if ((!empty($_POST['dip_school'])) || (!empty($_POST['dip_year'])) || (!empty($_POST['dip_award']))){
				$k_error .= "<br/><b>Error encountered while setting Diploma Qualifications</b><br/>";
				if (empty($_POST['dip_name'])) {$k_error .= "-The examination body must be provided<br/>";$dip_error = true;}
				if (empty($_POST['dip_school'])) {$k_error .= "-The institution name must be provided<br/>";$dip_error = true;}
				if (empty($_POST['dip_year'])) {$k_error .= "-The year must be provided<br/>";$dip_error = true;}
				if (empty($_POST['dip_award'])) {$k_error .= "-The award must be provided<br/>";$dip_error = true;}
			
			}
			if ((empty($_POST['dip_school'])) && (empty($_POST['dip_year'])) && (empty($_POST['dip_award']))) $delete_dip =true;
			
			//higer diploma
			if ((!empty($_POST['h_dip_school'])) || (!empty($_POST['h_dip_year'])) || (!empty($_POST['h_dip_award']))){
				$k_error .= "<br/><b>Error encountered while setting Higher Diploma Qualifications</b><br/>";
				if (empty($_POST['h_dip_name'])) {$k_error .= "-The examination body must be provided<br/>";$dip_error = true;}
				if (empty($_POST['h_dip_school'])) {$k_error .= "-The institution name must be provided<br/>";$h_dip_error = true;}
				if (empty($_POST['h_dip_year'])) {$k_error .= "-The year must be provided<br/>";$h_dip_error = true;}
				if (empty($_POST['h_dip_award'])) {$k_error .= "-The award must be provided<br/>";$h_dip_error = true;}
			
			}
			if ((empty($_POST['h_dip_school'])) && (empty($_POST['h_dip_year'])) && (empty($_POST['h_dip_award']))) $delete_h_dip =true;
			
			
			//degree
			if ((!empty($_POST['deg_school'])) || (!empty($_POST['deg_year'])) || (!empty($_POST['deg_award']))){
				$k_error .= "<br/><b>Error encountered while setting Degree Qualifications</b><br/>";
				if (empty($_POST['deg_school'])) {$k_error .= "-The institution name must be provided<br/>";$deg_error = true;}
				if (empty($_POST['deg_year'])) {$k_error .= "-The year must be provided<br/>";$deg_error = true;}
				if (empty($_POST['deg_award'])) {$k_error .= "-The award must be provided<br/>";$deg_error = true;}
			
			}
			if ((empty($_POST['deg_school'])) && (empty($_POST['deg_year'])) && (empty($_POST['deg_award']))) $delete_deg =true;
			
				/*
			*	delete qualifications
			*/
			
			//delete KCSE qualifications
			if (!empty($edit) && $delete_kcse) {
			
				KcseQualification::model()->deleteAll('app_id=:app',array(':app'=>$edit));
				AcademicQualification::model()->delete('app_id=:app AND category_id=1',array(':app'=>$edit));
			}
			//delete OLevel Equivalent
			if (!empty($edit) && $delete_olevel) {
			
					AcademicQualification::model()->delete('app_id=:app AND category_id=6',array(':app'=>$edit));
			}
			//delete Certificate Qualifications
			if ((!empty($edit)) && $delete_cert) {
			
				AcademicQualification::model()->delete('app_id=:app AND category_id=2',array(':app'=>$edit));
			}
			//delete Diploma Qualifications
			if ((!empty($edit)) && $delete_dip) {
			
				AcademicQualification::model()->delete('app_id=:app AND category_id=3',array(':app'=>$edit));
			}
			//delete Higher Diploma Qualifications
			if (!empty($edit) && $delete_h_dip) {
			
				AcademicQualification::model()->delete('app_id=:app AND category_id=4',array(':app'=>$edit));
			}														
			//delete Degree Qualifications
			if (!empty($edit) && $delete_deg) {
						
				AcademicQualification::model()->delete('app_id=:app AND category_id=5',array(':app'=>$edit));
			}
			//<><> 
			
			
			if (($kcse_error) || ($cert_error) || ($dip_error) || ($h_dip_error) || ($deg_error) )
			{
			
				Yii::app()->user->setFlash('error', $k_error);
			
			}//save academic qualifications
			else{
			
						
				//KCSE
				if (!empty($_POST['kcse_school'])){
				
					$academicQual = new AcademicQualification;
					if (!empty($edit)){
					
						$academicQual = AcademicQualification::model()->find('app_id=:app AND category_id=1',array(':app'=>$edit));
						if (empty($academicQual->id)) $academicQual = new AcademicQualification;
					}
					$academicQual->app_id = $model->id;
					if (!empty($edit)) $academicQual->app_id = $edit;
					$academicQual->name = 'KCSE';
					$academicQual->category_id = 1;
					$academicQual->year = $_POST['kcse_year'];
					$academicQual->grade = $_POST['kcse_mean_grade'];
					$academicQual->school = $_POST['kcse_school'];
					$academicQual->date_modified=time();
					if (!$academicQual->save()) {echo CHtml::errorSummary($academicQual); exit;}
					
					//add the subjects
					for($s=0;$s<count($kcse_subjects);$s++){
						
						$grade = (!empty($_POST[$kcse_subjects[$s]->code]))?$_POST[$kcse_subjects[$s]->code]:'';
						
						if(!empty($grade)){
						
							//
							if (!empty($edit)){

							$academicQual = KcseQualification::model()->find('app_id=:app AND name=:n ',array(':app'=>$edit,':n'=>$kcse_subjects[$s]->code));
							if (empty($academicQual->id)) $academicQual = new KcseQualification;
							}
							$academicQual->app_id = $model->id;
							if (!empty($edit)) $academicQual->app_id = $edit;
							
							//save KCSE qualifications
							$academicQual->name = $kcse_subjects[$s]->code;
							$academicQual->category_id = 1;
							$academicQual->year = $_POST['kcse_year'];
							$academicQual->grade = $grade;
							$academicQual->school = $_POST['kcse_school'];
							$academicQual->date_modified=time();
							if (!$academicQual->save()) {echo CHtml::errorSummary($academicQual); exit;}
						}
					
					}
				}
								
				//OLEVEL EQUIVALENT
				if (!empty($_POST['olevel_school'])){
				
					$academicQual = new AcademicQualification;
					if (!empty($edit)){
					
						$academicQual = AcademicQualification::model()->find('app_id=:app AND category_id=6',array(':app'=>$edit));
						if (empty($academicQual->id)) $academicQual = new AcademicQualification;
					}
					$academicQual->app_id = $model->id;
					if (!empty($edit)) $academicQual->app_id = $edit;
					$academicQual->name = $_POST['olevel_name'];
					$academicQual->category_id = 6;
					$academicQual->year = $_POST['olevel_year'];
					$academicQual->grade = $_POST['olevel_award'];
					$academicQual->school = $_POST['olevel_school'];
					$academicQual->date_modified=time();
					if (!$academicQual->save()) {echo CHtml::errorSummary($academicQual); exit;}
				}
				
				
				//Certificate
				if (!empty($_POST['cert_school'])){
				
					$academicQual = new AcademicQualification;
					if (!empty($edit)){
					
						$academicQual = AcademicQualification::model()->find('app_id=:app AND category_id=2',array(':app'=>$edit));
						if (empty($academicQual->id)) $academicQual = new AcademicQualification;
					}
					$academicQual->app_id = $model->id;
					if (!empty($edit)) $academicQual->app_id = $edit;
					$academicQual->name = 'Certificate';
					$academicQual->category_id = 2;
					$academicQual->year = $_POST['cert_year'];
					$academicQual->grade = $_POST['cert_award'];
					$academicQual->school = $_POST['cert_school'];
					$academicQual->date_modified=time();
					if (!$academicQual->save()) {echo CHtml::errorSummary($academicQual); exit;}
				}
				
				//Diploma
				if (!empty($_POST['dip_school'])){
				
					$academicQual = new AcademicQualification;
					if (!empty($edit)){
					
						$academicQual = AcademicQualification::model()->find('app_id=:app AND category_id=3',array(':app'=>$edit));
						if (empty($academicQual->id)) $academicQual = new AcademicQualification;
					}
					$academicQual->app_id = $model->id;
					if (!empty($edit)) $academicQual->app_id = $edit;
					$exam = ($_POST['dip_name']==1)?' (KNEC)':' (INTERNAL)';
					$academicQual->name = 'Diploma'.$exam;
					$academicQual->category_id = 3;
					$academicQual->year = $_POST['dip_year'];
					$academicQual->grade = $_POST['dip_award'];
					$academicQual->school = $_POST['dip_school'];
					$academicQual->date_modified=time();
					if (!$academicQual->save()) {echo CHtml::errorSummary($academicQual); exit;}
				
				}
				
				//H Dip
				if (!empty($_POST['h_dip_school'])){
				
					$academicQual = new AcademicQualification;
					if (!empty($edit)){
					
						$academicQual = AcademicQualification::model()->find('app_id=:app AND category_id=4',array(':app'=>$edit));
						if (empty($academicQual->id)) $academicQual = new AcademicQualification;
					}
					$academicQual->app_id = $model->id;
					if (!empty($edit)) $academicQual->app_id = $edit;
					$exam = ($_POST['h_dip_name']==1)?' (KNEC)':' (INTERNAL)';
					$academicQual->name = 'Higher Diploma'.$exam;
					$academicQual->category_id = 4;
					$academicQual->year = $_POST['h_dip_year'];
					$academicQual->grade = $_POST['h_dip_award'];
					$academicQual->school = $_POST['h_dip_school'];
					$academicQual->date_modified=time();
					if (!$academicQual->save()) {echo CHtml::errorSummary($academicQual); exit;}
				
				}
				
				//Degree
				if (!empty($_POST['deg_school'])){
				
					$academicQual = new AcademicQualification;
					if (!empty($edit)){
					
						$academicQual = AcademicQualification::model()->find('app_id=:app AND category_id=5',array(':app'=>$edit));
						if (empty($academicQual->id)) $academicQual = new AcademicQualification;
					}
					$academicQual->app_id = $model->id;
					if (!empty($edit)) $academicQual->app_id = $edit;
					$academicQual->name = 'Degree';
					$academicQual->category_id = 5;
					$academicQual->year = $_POST['deg_year'];
					$academicQual->grade = $_POST['deg_award'];
					$academicQual->school = $_POST['deg_school'];
					$academicQual->date_modified=time();
					if (!$academicQual->save()) {echo CHtml::errorSummary($academicQual); exit;}
				
				}
												
				//manage uploads
				if (isset($_POST['photo'])){
					
					$temp = $_POST['photo'];
					$model->extra_info = $temp;
					
					//save passport photo
					if($file=CUploadedFile::getInstance($model,'extra_info'))
					{
						//capture photo name
						$rnd = rand(0,9999);
						$fileName = "{$rnd}_{$file}";  
						$model->extra_info = $fileName; 
						//upload photo
						$file->saveAs(Yii::app()->basePath.'/../images/applications/'.$model->extra_info); 
					}

					
					
					$applicant = Applicant::model()->find('id=?',array($model->id));
					
					$applicant->status = 1;
					
					//update applicant details
					$applicant->save();
				}
						
				Yii::app()->user->setFlash('success', "<b>Congratulations, your academic qualifications have been added successfully!</b>");
				if (!empty($edit)) Yii::app()->user->setFlash('success', "<b>Congratulations, your academic qualifications have been updated successfully!</b>");
				$this->redirect(Yii::app()->createUrl('//courseApplication/default/profile'));
				
			}
			
					
			
		}
	
		
		$_POST['dip_name']=$_POST['h_dip_name']=2;
		//populate from existing qualifications
		if (!empty($edit)){

			$kcse = AcademicQualification::model()->find('app_id=:app AND category_id=1',array(':app'=>$edit));
				$_POST['kcse_year'] = (!empty($kcse->year))?$kcse->year:'';
				$_POST['kcse_mean_grade'] = (!empty($kcse->grade))?$kcse->grade:'';
				$_POST['kcse_school'] = (!empty($kcse->year))?$kcse->school:'';
				
				//KCSE Subjects
				for($s=0;$s<count($kcse_subjects);$s++){
			
					$academicQual = KcseQualification::model()->find('app_id=:app AND name=:n ',array(':app'=>$edit,':n'=>$kcse_subjects[$s]->code));
					$_POST[$kcse_subjects[$s]->code] = (!empty($academicQual->grade))?$academicQual->grade:'';
				}
			
			
			$olevel = AcademicQualification::model()->find('app_id=:app AND category_id=6',array(':app'=>$edit));
				$_POST['olevel_name'] = (!empty($olevel->year))?$olevel->name:'';
				$_POST['olevel_year'] = (!empty($olevel->year))?$olevel->year:'';
				$_POST['olevel_award'] = (!empty($olevel->grade))?$olevel->grade:'';
				$_POST['olevel_school'] = (!empty($olevel->year))?$olevel->school:'';
				
			$cert = AcademicQualification::model()->find('app_id=:app AND category_id=2',array(':app'=>$edit));
				$_POST['cert_year'] = (!empty($cert->year))?$cert->year:'';
				$_POST['cert_award'] = (!empty($cert->grade))?$cert->grade:'';
				$_POST['cert_school'] = (!empty($cert->school))?$cert->school:'';
			
			$dip = AcademicQualification::model()->find('app_id=:app AND category_id=3',array(':app'=>$edit));
				$_POST['dip_year'] = (!empty($dip->year))?$dip->year:'';
				$_POST['dip_award'] = (!empty($dip->grade))?$dip->grade:'';
				$_POST['dip_school'] = (!empty($dip->school))?$dip->school:'';
				//name extraction
				if (isset($dip->name)) $name =  trim(substr($dip->name,7));$name ="";
				if ($name=='(KNEC)') $_POST['dip_name'] = 1; else $_POST['dip_name'] = 2;
			
			$h_dip = AcademicQualification::model()->find('app_id=:app AND category_id=4',array(':app'=>$edit));
				$_POST['h_dip_year'] = (!empty($h_dip->year))?$h_dip->year:'';
				$_POST['h_dip_award'] = (!empty($h_dip->grade))?$h_dip->grade:'';
				$_POST['h_dip_school'] = (!empty($h_dip->school))?$h_dip->school:'';
				//name extraction
				if (isset($h_dip->name)) $name =  trim(substr($h_dip->name,14));$name ="";
				if ($name=='(KNEC)') $_POST['h_dip_name'] = 1; else $_POST['h_dip_name'] = 2;
				
			$deg = AcademicQualification::model()->find('app_id=:app AND category_id=5',array(':app'=>$edit));
				$_POST['deg_year'] = (!empty($deg->year))?$deg->year:'';
				$_POST['deg_award'] = (!empty($deg->grade))?$deg->grade:'';
				$_POST['deg_school'] = (!empty($deg->school))?$deg->school:'';
		}
		//capture form data
		$data = $_POST;
		$this->render('qualifications',array('model'=>$model,'data'=>$data,'kcse_subjects'=>$kcse_subjects));
	}

}
