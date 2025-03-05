<?php
Yii::import('application.modules.hr.models.*');
Yii::import('application.modules.user.models.User');
class PageController extends GxController
{
	public $pageTitle = "Staff ePortal - The Technical University of Kenya";
	public $keyWords = "staff portal, tuk staff, staff profiles";
	public $description = "Staff portal for the Technical University of Kenya. This portal provides a centralized one-stop place where a staff can get access to the University Services";
	public function actionTopManagement()
	{
		$this->pageTitle = 'The University Top Management :: '.$this->pageTitle;
		$this->keyWords = "Top management in Kenya, TUK Managers, VC,DVCs, Deans and Directors in the Technical University of Kenya";
		$this->description = "The Vice Chancellor, Deputy Vice Chancellors, and Executive Deans in the Technical University of Kenya";
		$this->render('managers', array('managers' => StaffHelper::managers()));
	}
	public function actionProfessors()
	{
		$this->pageTitle = 'List of Professors :: '.$this->pageTitle;
		$this->keyWords = "professors in Kenya, TUK Professors, Professors in the Technical University of Kenya";
		$this->description = "This is the list of Professors in the Technical University of Kenya in diverse fields of research especially in engineering sciences, applied and social sciences";
		$this->academic(1);
	}
	public function actionAssociateProfessors()
	{
		$this->pageTitle = 'List of Associate Professors :: '.$this->pageTitle;
		$this->keyWords = "professors in Kenya, TUK Professors, Professors in the Technical University of Kenya";
		$this->description = "This is the list of Associate Professors in the Technical University of Kenya in diverse fields of research especially in engineering sciences, applied and social sciences";
		$this->academic(6);
	}
	public function actionAdjunct()
	{
		$this->pageTitle = 'List of Adjunct Professors :: '.$this->pageTitle;
		$this->keyWords = "adjunct professors in Kenya, TUK Professors, Professors in the Technical University of Kenya";
		$this->description = "This is the list of Adjunct Professors in the Technical University of Kenya in diverse fields of research especially in engineering sciences, applied and social sciences";
		$this->academic(8);
	}
	public function actionDoctors()
	{
		$this->pageTitle = 'List of Professors :: '.$this->pageTitle;
		$this->keyWords = "doctorate holders in Kenya, TUK Doctors, Doctors in the Technical University of Kenya";
		$this->description = "This is the list of Doctors(Doctorate Holders) in the Technical University of Kenya in diverse fields of research especially in engineering sciences, applied and social sciences";
		$this->academic(2);
	}
	public function actionMedicalDoctors()
	{
		$this->pageTitle = 'List of Medical Doctors :: '.$this->pageTitle;
		$this->keyWords = "doctorate holders in Kenya, TUK Doctors, Doctors in the Technical University of Kenya";
		$this->description = "This is the list of Medical Doctors in the Technical University of Kenya ";
		$this->academic(7);
	}
	public function academic($id) {
		
		$staff = $header = $others = '';
		switch($id){
			
			case 1://professors
			$criteria = new CDbCriteria;
			$criteria->condition  = 'title_id=6 AND status !=7';
			$criteria->order = 'wt ASC';
			$staff = Employee::model()->findAll($criteria);
			$staff1 = Employee::model()->findAll('(title_id=6 OR title_id=12 OR title_id=14) AND status =7');
			$c = count($staff);$c1 = count($staff1);
			$header = "Full Professors (".$c.')';
			$header1 = "Professors who Have Left (".$c1.')';
			$others = Employee::otherProfessors(6);
			break;
			
			case 2://doctros
			$staff = Employee::model()->findAll('(title_id=5 or title_id=9)  AND status !=7');
			$staff1 = Employee::model()->findAll('(title_id=5 or title_id=9)  AND status =7');
			$c = count($staff);$c1 = count($staff1);
			$header = "Doctors - Doctorate Holders (".$c.')';
			$header1 ="Doctors  - Doctorate Holders who Have Left (".$c1.')';
			break;
			
			case 3://masters
			$criteria = new CDbCriteria;
			$criteria->with = array('hqualification');
			$criteria->together = true;
			$criteria->condition  = 'hqualification.weight=2';
			$staff = Employee::model()->findAll($criteria);
			$header = "Masters and Postgraduate Diploma Holders";
			break;
			
			
			case 4://bachelors
			$criteria = new CDbCriteria;
			$criteria->with = array('hqualification');
			$criteria->together = true;
			$criteria->condition  = 'hqualification.weight=3';
			$staff = Employee::model()->findAll($criteria);
			$header = "Bachelor Holders";
			break;
			
			case 5://diplomas
			$criteria = new CDbCriteria;
			$criteria->with = array('hqualification');
			$criteria->together = true;
			$criteria->condition  = 'hqualification.weight>3';
			$staff = Employee::model()->findAll($criteria);
			$header = "Diploma & Certificate Holders";
			break;
			
			case 6://associate professors
			$criteria = new CDbCriteria;
			$criteria->condition  = 'title_id=10 AND status !=7';
			$criteria->order = 'wt ASC';
			$staff = Employee::model()->findAll($criteria);
			$staff1 = Employee::model()->findAll('title_id=10 AND status =7');
			$c = count($staff);$c1 = count($staff1);
			$header = "Associate Professors (".$c.')';
			$header1 = "Associate Professors who Have Left (".$c1.')';
			$others = Employee::otherProfessors(10);
			break;
			
			case 7://medical doctors
			$staff = Employee::model()->findAll('title_id=11 AND status !=7');
			$staff1 = Employee::model()->findAll('title_id=11 AND status =7');
			$c = count($staff);$c1 = count($staff1);
			$header = "Medical Doctors (".$c.')';
			$header1 = "Medical Doctors who Have Left (".$c1.')';
			break;

			case 8://adjunct
			$staff = Employee::model()->findAll('(title_id=12 OR title_id=13 OR title_id=14) AND status !=7');
			$c = count($staff);$c1 = count($staff);
			$header1 = $header = "Adjunct Professors and Related (".$c.')';
			break;
			
			
		}

		$this->render('staff',array('staff'=>$staff,'others'=>$others,'header'=>$header,'header1'=>$header1));
	}
	
	public function actionPublications()
	{
		$this->pageTitle = 'List of Publications:: '.$this->pageTitle;
		$this->keyWords = "publications in Technical University of Kenya, journals, publications, staff publications";
		$this->description = "This is the list of publications for staff of the Technical University of Kenya";
		$criteria = new CDbCriteria;
		$criteria->order='id DESC';
		$publications = EmployeePublication::model()->findAll($criteria);
		
		$header = "List of Publications";
		
		$this->render('publications',array('publications'=>$publications,'header'=>$header));
	}
	
	public function actionCourseUnitsTaught()
	{
		$this->pageTitle = 'List of Course Units Taught :: '.$this->pageTitle;
		$this->keyWords = "courses taught in Technical University of Kenya, course units, staff courses taught";
		$this->description = "This is the list of Courses Taught by Staff in Technical University of Kenya";
		$criteria = new CDbCriteria;
		$criteria->order='id DESC';
		$courses = EmployeeCourse::model()->findAll($criteria);
		
		$header = "List of Course Units Taught";
		
		$this->render('courses',array('courses'=>$courses,'header'=>$header));
	}
	public function actionAcademicStaff()
	{
				
			$this->pageTitle = "List of Academic Staff Members  :: ".$this->pageTitle;
			$this->keyWords = "academic staff members, staff list, academic staff";
			$this->description = "This page shows a list of academic staff members  at the Technical University of Kenya.";
			$header = "List of Academic Staff Members";
			//<><><><> condition for querying ////
			$criteria=new CDbCriteria;
			$criteria->with = array('employment');
    		$criteria->condition = 'employment.category_id=1 AND t.status !=7';
			$staff = Employee::model()->findAll($criteria);	
			
			$this->render('staff',array('staff'=>$staff,'header'=>$header));
				
	}

	public function actionAdministrationStaff()
	{
				
			$this->pageTitle = "List of Staff Members in the Administration  :: ".$this->pageTitle;
			$this->keyWords = "administrative staff members, staff list, academic staff";
			$this->description = "This page shows a list of administrative staff members  at the Technical University of Kenya.";
			$header = "List of Staff Members in the Administration";
			//<><><><> condition for querying ////
			$criteria=new CDbCriteria;
			$criteria->with = array('employment');
    		$criteria->condition = 'employment.category_id=2 AND t.status !=7';
			$staff = Employee::model()->findAll($criteria);	
			
			$this->render('staff',array('staff'=>$staff,'header'=>$header));
				
	}
	
	public function actionMostViewedProfiles()
	{
				
			$this->pageTitle = "Top Viewed Staff Profiles  :: ".$this->pageTitle;
			$this->keyWords = "top viewed staff members, staff list, academic staff";
			$this->description = "This page shows a list of staff members mostly viewed or searched";
			$header = "Most Viewed Staff Profiles";
			
			$command = Yii::app()->db->createCommand("SELECT profile_id, COUNT(*) AS num FROM pol_employee_profile_view right join pol_employee ON (pol_employee.id=profile_id) WHERE status!=7 GROUP BY profile_id ORDER BY num DESC LIMIT 200");
			
			foreach($command->queryAll() as $row) {
			
				$s = Employee::model()->findByPk($row['profile_id']);
				if (isset($s->id)) {
					$staff[] = $s;
					$views[] = $row['num'];
				}
				
			
			 }
			
			$this->render('staff',array('staff'=>$staff,'views'=>$views, 'header'=>$header));
				
	}
	public function actionDownload($file){Yii::app()->utility->downloadPrivateFile('staff/uploads/'.$file); }
	public function actionVisitPage($url){Yii::app()->utility->visitPage($url);}
	
	
	public function filters() {
	return array(
				'accessControl', 
				);
	}
	public function accessRules() {
		return array(
				array('allow', 
					'actions'=>array(
						'topManagement',
						'professors',
						'associateProfessors',
						'doctors',
						'medicalDoctors',
						'adjunct',
						'publications',
						'courseUnitsTaught',
						'academicStaff',
						'administrationStaff',
						'mostViewedProfiles',
						'download',
						'visitPage'
					),
					'users'=>array('*'),
					),
				
				array('deny', 
				'users'=>array('*'),
				),
		);
	}
	
}