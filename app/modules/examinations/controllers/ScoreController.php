<?php
Yii::import('application.modules.admission.models.*');
class ScoreController extends GxController {

public $error_message="";
public $newscore=0;
public $lastrow=0;
public $courseunit=0;
public $dup=0;
public $msg='';

public function behaviors()
{
		return array(
			'eexcelview'=>array(
				'class'=>'ext.eexcelview.EExcelBehavior',
			),
		);
}
	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin', 'create','update','view','studentTranscript','classTranscript','uploadScores'),
				'roles'=>array(12,15),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'Score'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'Score'),
			));
	}

	public function actionCreate() {
		$model = new Score;


		if (isset($_POST['Score'])) {
			$model->setAttributes($_POST['Score']);
			$model->status = 1;
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('create', array( 'model' => $model));
		else
			$this->renderPartial('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Score');


		if (isset($_POST['Score'])) {
			$model->setAttributes($_POST['Score']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('update', array(
				'model' => $model,
				));
		else
			$this->renderPartial('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Score')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new Score('search');
		$model->unsetAttributes();

		if (isset($_GET['Score']))
			$model->setAttributes($_GET['Score']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new Score('search');
		$model->unsetAttributes();

		if (isset($_GET['Score']))
			$model->setAttributes($_GET['Score']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	function actionStudentTranscript( $format='')
	{
		$model = new Score;
		//echo $format;exit;
		if (isset($_POST['Score']))
		{
			$model->setAttributes($_POST['Score']);
			$criteria=new CDbCriteria;
			$criteria->condition = "student_reg ='" . $model->student_reg . "' AND year_of_study=". $model->year_of_study;
			$scores = new CActiveDataProvider('Score', array('criteria' => $criteria,'pagination'=>array('pageSize'=>1000)));
			//echo count($scores);exit;
			if($scores->totalItemCount>0){
			
				$student = Score::model()->find('student_reg=:reg AND year_of_study=:yr', array(':reg'=>$model->student_reg,':yr'=>''.$model->year_of_study));
				$university = Institution::model()->findByPk(1);
				$title = "ACADEMIC TRANSCRIPT";
				
				//export to pdf
				if ($format === 'pdf'){
					$user=User::model()->findByPk(Yii::app()->user->id);
					$generator = "Transcript generated by $user->name";	
					$generator = $generator." on ".date('F j, Y, g:i a',time());
					$mPDF1 = Yii::app()->ePdf->mpdf("Transcript");
					$mPDF1->WriteHTML(
					$this->renderPartial(
						'student_transcript_pdf',
						array(
							'scores' => $scores,
							'student'=>$student,
							'university'=>$university->name,
							'title'=>$title,
							'generator'=>$generator,
						)
					,true));
					
					$mPDF1->Output();
				}
				else if ($format === 'excel'){
					$this->toExcel($scores,
					array(
							'course_unit_id',
							'courseUnit',
							'hours',
							'marks_obtained',
							//'marks_total',
							'grade',
							'remarks',
						),
						'Transcript',
						array(
							'creator' => 'Zen',
						),
						'Excel5'
					);
		
				}
				else $this->render('student_transcript', array('model'=>$model,'scores' => $scores,'student'=>$student,'title'=>$title,'university'=>$university->name));
			}
			else{
				Yii::app()->user->setFlash('error', "<b>Transcript Generation Failure</b><br/> No transript records found matching the student and the year of study, please try again later.");
				$this->render('search_student', array('model' => $model,));
			}
		}
		else $this->render('search_student', array('model' => $model,));
	}
	
	function actionClassTranscript( $format='')
	{
		$model = new Score;
		//echo $format;exit;
		if (isset($_POST['Score']))
		{
			$model->setAttributes($_POST['Score']);
			$criteria=new CDbCriteria();
			//get a list of students
			$students=Student::model()->findAll('LOWER(class_code)=?', array(strtolower($model->student_reg)));
			$scores=new CActiveDataProvider('Score', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100000)));
			
			if(isset($_POST['studentids'])){
			
				$criteria=new CDbCriteria();
				$criteria->addInCondition('id',$_POST['studentids']); 
				$students=Student::model()->findAll($criteria);
			
			}
			
			
			
			if(count($students)>0){
			
				//get all the scores for the class
				for ($i=0;$i<count($students);$i++){
					$str []=$students[$i]->reg_number;
				}
				
				//get scores for student for the year of study
				$criteria=new CDbCriteria();
				$criteria->condition = " year_of_study = ". $model->year_of_study;
				$criteria->addInCondition('student_reg',$str); 
				$scores=new CActiveDataProvider('Score', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100000)));
				
				if($scores->getTotalItemCount()>0){
								
					$university = Institution::model()->findByPk(1);
					
					$f = $scores->data[0]->final;
					$final = ($f == 1)?'(FINAL)':'';
					
					//printable transcripts
					//export to pdf
					if ($format === 'pdf'){
					
					
						//record marksheet uploads
						$processing = new ScoreProcessing;
						$processing->class_code = $model->student_reg;
						$processing->year_of_study = $model->year_of_study;
						$processing->final = $f;
						$processing->total = count($students);
						$processing->date_modified = time();
						$processing->author = Yii::app()->user->id;
						$processing->category = 2;
						$processing->save();
					
						$user=User::model()->findByPk(Yii::app()->user->id);
						$generator = "Transcript generated by $user->name";	
						$generator = $generator." on ".date('F j, Y, g:i a',time());
						$mPDF1 = Yii::app()->ePdf->mpdf(
						
						1,'A4',12,'Calibri',2,2,2,2,2,2,'P'
						);
						$mPDF1->WriteHTML(
							$this->renderPartial(
								'class_transcript_pdf',
								array(
								'students'=>$students,
								'final'=>$final,
								'model'=>$model,
								'scores' => $scores,
								'year_of_study'=>$model->year_of_study,
								'university'=>$university->name
								
								),true)
						);
											
						$mPDF1->Output();
					}
					//deleting scores
					else if ($format === 'delete'){
						
						//
						$records = count($students);
						$s=0;
						foreach ($scores->getData() as $data => $singleRecord){
							
							$this->loadModel($singleRecord->id, 'Score')->delete();
							$s++;
						}
						
						
						$processing = new ScoreProcessing;
						$processing->class_code = $model->student_reg;
						$processing->year_of_study = $model->year_of_study;
						$processing->final = $f;
						$processing->total = $records;
						$processing->date_modified = time();
						$processing->author = Yii::app()->user->id;
						$processing->category = 3;
						$processing->save();
						
						Yii::app()->user->setFlash('success', '<b>Class scores trashing</b><br/> Score Trashing Successful! The class '.$model->student_reg.' with a total of '.$records.' student(s) for year '.$model->year_of_study.' scores have been deleted [ comprising of '.$s.' individual course unit scores]');
						$this->redirect(array('admin'));
					}				
					//render the scores
					else $this->render('class_transcript', array('students'=>$students,'model'=>$model,'scores' => $scores,'final'=>$final,'year_of_study'=>$model->year_of_study,'university'=>$university->name));
				}
				else{
					Yii::app()->user->setFlash('error', "<b>Transcript Generation Failure</b><br/> No scores have been submitted for the class for that year of study, please try again.");
					$this->render('search_class', array('model' => $model,));
				}
			}
			else{
				Yii::app()->user->setFlash('error', "<b>Transcript Generation Failure</b><br/> No students records found matching the class code, please try again.");
				$this->render('search_class', array('model' => $model,));
			}
		}
		else $this->render('search_class', array('model' => $model,));
	}
	
	//upload scores as CSV
	public function actionUploadScores(){
	
		$model = new Score;
		
		//upload the csv file to the server
		if($csvFile=CUploadedFile::getInstance($model,'marks_total'))
		{
			$extension = $csvFile->extensionName;
			
			//ensure it is csv file
			if($extension === 'csv'){
			
			
				$nameparts = explode('_',$csvFile->name);
				
				if (count($nameparts>1) && count($nameparts>4)){
				
					$classcode =  $nameparts[0];
					$year =  $nameparts[1];
					
					
					//ensure the year is correctly specified
					if(($year >0 )&& ($year<7) ){
					
					
						//check for final scores
						if(isset($nameparts[2])&& $nameparts[2] !='F.csv' ){
						
							Yii::app()->user->setFlash('error', '<b>Upload Error!</b><br/>It seems you did not save the Mark Sheet correctly. Kindly specify correct academic year and save the file again eg ABCD/2013_1.<br/>
							Kindly remember that if this is Marksheet for final scores, then save as ABCD/2013_1_F');
						}
						else{
						
							$FINAL = isset($nameparts[2])?1:0;
							//upload the file
							$name = $csvFile->name.'['.date('Y_m_d H_i_s').'].'.$extension;
							$marksheet = Yii::app()->basePath.'/../protected/data/examinations/'.$name;
							$csvFile->saveAs($marksheet);
							
							$year = explode('.',$year);
							$yr = $year[0];
							
							//process data and save to database
							$classcode = str_replace(".", "/", $classcode);
							$this->processMarkSheet($marksheet,$yr, $classcode,$FINAL);
						}
					}
					else{
						Yii::app()->user->setFlash('error', '<b>Upload Error!</b><br/>It seems you did not save the Mark Sheet correctly. Kindly specify correct academic year and save the file again eg ABCD/2013_1');
					}
				}
				else{
						
					Yii::app()->user->setFlash('error', '<b>Upload Error!</b><br/>It seems you did not save the Mark Sheet correctly. Kindly specify correct academic year and save the file again eg ABCD/2013_1. In case it is final scores save as ABCD/2013_1_F');
				}
			}
			else{
				Yii::app()->user->setFlash('error', '<b>Upload Error!</b><br/>Wrong file format chosen, ensure the mark sheet file is saved as CSV file.');
			}
		}
		$this->render('batch/batch',array('model' => $model));
		
	}
	
	
	
	public function processMarkSheet($marksheet,$year,$classcode,$F){
		
		//grab the marksheet data and identify the headers suc as course codes
		if (($handle = fopen($marksheet, "r")) !== FALSE) {
			
			$error = false;
			$row=0;
			
			$sc = new Score;
			$criteria=new CDbCriteria;
			$criteria->select='MAX(id) AS id';
			$rr = Score::model()->find($criteria);
			$this->lastrow = $rr->id;
			

			while (($data = fgetcsv($handle, 2000, ",")) !== FALSE) {
				
				//number of fields
				$num = count($data);
				$number=0;
				//get scores labels starting 9th header
				for ($c=9;$c<$num;$c++){
					$code = substr(trim(strtolower($data[$c])),0,4);
					if ($code==='code'){ $number++; }
				}
				break;//just capture data fields and exit  loop
				
			}
		
			//start processing data:: remember it will always start from
			//the second row now
			$studentserial = 0;
			while (($data = fgetcsv($handle, 2000, ",")) !== FALSE) {
				if($number>0)
				{
					//process one by one
					$reg_number = $data[0];
					$name = $data[1];
					
					//getting cell locations for course, course description, marks and grades
					$course = 9;
					$description = $course+1;
					$marks = $course + ($number*2);
					$grade = $marks+1;
					$hours = $grade+1;
					$str ='';
					$index=$course;
					
					$stud = Student::model()->find('reg_number=:reg', array(':reg'=>$reg_number));
					
					if(isset($stud->id)){
						$rec_index = ($number*2)+($number*3)+9;
						if (isset($data[$rec_index])) $recommendation=$data[$rec_index];
						else {
						
							$this->error_message .= " The marksheet is not well formatted. Please check the recommendation part of the scores<br/>";
							break;
						
						}
						
						for ($j=0;$j<$number;$j++){
							
							$reg_number;
							$course_code = trim(preg_replace('/\s+/', '', $data[$index]));
							
							$course_description = trim(strtoupper($data[$index+1]));
							
							$mark = $data[$marks];
							
							$g = $data[$grade];
							
							$hr = $data[$hours]; 			
							
							
							$this->saveScore(
								$year,
								$classcode,
								$reg_number,
								$name,
								$course_code,
								$course_description,
								$mark,
								$g,
								$hr,
								$recommendation,
								$F
								
								);				
							
							$index+=2;
							$marks +=3;
							$grade +=3;
							$hours +=3;
							
						}
						
						$studentserial++;
					}
					
					
				}
				//
				$row++;
				
			}
			
			fclose($handle);
			
			if ($this->dup>0) Yii::app()->user->setFlash('warning', '<b>Mark sheet processing warnings !</b><br/>'.$this->dup.' duplicate(s) found and ignored.<br/> Trail...<br/>'.$this->msg);
			
			if (empty($this->error_message)){
			
				//record marksheet uploads
				$processing = new ScoreProcessing;
				$processing->class_code = $classcode;
				$processing->year_of_study = $year;
				$processing->final = $F;
				$processing->total = $studentserial;
				$processing->date_modified = time();
				$processing->author = Yii::app()->user->id;
				$processing->category = 1;
				$processing->save();
								
				
				Yii::app()->user->setFlash('success', '<b>Upload Successful!</b><br/>'.$this->courseunit.' new course unit(s) added. Marks for a total of '.$studentserial.' students with class code ['.$classcode.'] uploaded successfully!');
			}
			else{
				
				Yii::app()->user->setFlash('error', '<b>Mark sheet processing error !</b><br/>'.$this->error_message);
			}
		
		}
		else{
			Yii::app()->user->setFlash('error', '<b>Mark sheet processing error !</b><br/>An error was encountered while processing the marksheet, kindly try again or contact the support team.');
		}
	
	}
	
	
	//save marks
	public function saveScore($year_of_study, $classcode, $reg_number, $name,$course_code ,$course_description ,$marks ,$grade , $hours, $recommendation,$F)
	{
		//record course unit
		$newCourse = CourseUnit::model()->find('code=:c', array(':c'=>$course_code));
		if(!isset($newCourse->id)){ $this->createCourse($course_code,$course_description);}
		
		//record score for student
		$this->createScore($year_of_study,$reg_number,$course_code,$marks ,$grade , $hours, $recommendation,$F);
		

	}	
	public function createCourse($code,$description)
	{
		$total = CourseUnit::model()->count();
		$unit = new CourseUnit;
		$unit->id = $total+1;
		$unit->name = preg_replace("/[^A-Za-z0-9]/","",$description); 
		$unit->code = preg_replace("/[^A-Za-z0-9]/","",$code);
		$unit->description = preg_replace("/[^A-Za-z0-9]/","",$description);
		$unit->department_id = 1;
		$unit->status = 1;
		$unit->date_modified = time(); 
		
		if (!$unit->save()){ echo $this->error_message .= "The course unit with code".$code.'-'.$description." could not be saved<br/>".CHtml::errorSummary($unit); exit;}
		else $this->courseunit++;
	
	}
	
	public function createScore($year_of_study, $reg_number,$course_code,$marks ,$grade , $hours, $recommendation,$F)
	{
		$duplicate = Score::model()->find('student_reg=:reg AND course_unit =:course AND year_of_study=:yr', array(':reg'=>$reg_number,':course'=>$course_code,':yr'=>$year_of_study));
		if(!empty($duplicate->id) && !empty($reg_number)) {$this->dup++; 
			
			$this->msg .= 'Duplicate '.$this->dup.': reg number: '.$reg_number.' year of study: '.$year_of_study.' course code: '.$course_code.' marks: '.$marks.'<br/>'; 
		
		}
		else{
			
			$score = new Score;
			$score->id = $this->lastrow+1;
			$score->student_reg = $reg_number;
			$score->semester_id = 44;
			$score->course_unit_id = 1;
			$score->course_unit = $course_code;
			$score->exam_type_id = 2;
			$score->year_of_study = $year_of_study;
			$score->semester_of_study = $year_of_study;
			$score->marks_obtained = $marks;
			$score->marks_total = 100;
			$score->grade = $grade;
			$score->hours = $hours;
			$score->remarks = $recommendation;
			$score->final = $F;
			$score->status = 1;
			$score->date_modified = time();
			if (!$score->save())$this->error_message .= "The score for student with registration number ".$reg_number.'-'.$course_code.'->'.$marks." could not be saved<br/>".CHtml::errorSummary($score);
			else {$this->newscore++; $this->lastrow++;}
		}
			
	}
}
