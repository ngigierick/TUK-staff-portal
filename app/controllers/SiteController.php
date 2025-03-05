<?php
Yii::import('application.modules.hr.models.*');
Yii::import('application.modules.portal.models.*');
Yii::import('application.modules.user.models.*');
class SiteController extends GxController
{

	
	public $pageTitle = "Staff ePortal";
	public $keyWords = "staff portal, tuk staff, staff profiles";
	public $description = "Staff portal for the Technical University of Kenya. This portal provides a centralized one-stop place where a staff can get access to the University Services. Again you can search for any staff mem";
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	public function actionIndex()
	{
	
		$this->redirect(Yii::app()->createUrl('//portal/profile/home'));
		
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	
		//-----------------------
		if(isset(Yii::app()->user->id))
		$this->redirect(Yii::app()->createUrl('//portal/profile/home'));
		
		$model=new LoginForm;
		
		$this->pageTitle = 'Sign in to the Staff ePortal :: '.$this->pageTitle;
		$this->keyWords = "login to staff portal, tuk staff, staff profiles";
		$this->description = "You can login to to your staff account by using this link";

		/// normal authentication ///
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			
			
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->createUrl('//portal/profile/home'));
		}
		
		
		$this->render('login',array('model'=>$model,));
		////////////////////////////
	}
	
	

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		
		
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->createUrl('//portal/'));
		
	}
	
	
	public function actionSearch()
	{
		$this->pageTitle = 'Search for Staff '.$this->pageTitle;
		
		$this->keyWords = "search for staff, find staff, look for staff profiles";
		$this->description = "Search for staff member in the Technical University of Kenya. Find out their academic qualifications, designations, departments, and research areas, publications.";	
		$data = array();	
		if(!empty($_REQUEST['term']))
		{
			$str = $_REQUEST['term'];
			$terms = explode(" ",$str);
			UserActivity::record("validation_error"," searched for ".$str);
			if (strlen($str)>10){
				
				Yii::app()->user->setFlash('error','Invalid search term entered');
			}
			else{
				
				$criteria=new CDbCriteria;
				
				$sql ='';
				$sql .="	lower(t.firstname) 	like '%" . strtolower($terms[0]) . "%'";
				
				for ($i=0;$i<count($terms);$i++){
					
					$sql .="or	lower(firstname) 	like '%" . strtolower($terms[$i]) . "%'";
					$sql .="or	lower(surname) 	like '%" . strtolower($terms[$i]) . "%'";
					$sql .="or	lower(othername) 	like '%" . strtolower($terms[$i]) . "%'";
					
				}
				
				$criteria->condition = 'status!=7 AND ('.$sql.')';
				
		
				$dataProvider=new CActiveDataProvider('Employee', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>100000)));

				$data = $dataProvider->getData();
			}
			
			$this->render('pages/search_results',array('data'=>$data,'term'=>$str));
			
		}
		else{
			
			Yii::app()->user->setFlash('warning','Please enter your search term.');
			$this->render('pages/search_results');
		}
		
		
	}
	
	public function actionUpdatePDFs(){
		
		$save_path = '/var/www/staff/uploads/test.pdf';
		$url = 'http://staff.tukenya.ac.ke/index.php?r=portal/profile/public&id=905&pdf=1';
					
				
		$f = fopen( $save_path , 'w+');
		
		$handle = fopen($url , "r");
		  
		if(!$handle) echo "Error while opening file<br/>", $php_errormsg;
		else if(!$f) echo "Error while creating a file<br/>", $php_errormsg;
	  
	     
	    while (!feof($handle)) 
	    {
	        $contents = fread($handle, 8192);
	        fwrite($f , $contents);
	    }
	     
	    fclose($handle);
	    fclose($f);
		
		/*	
		//update profile PDF files
		set_time_limit(0); // unlimited max execution time
		$options = array(
		  CURLOPT_FILE    => '/var/www/staff/uploads/profiles/test.pdf',
		  CURLOPT_TIMEOUT =>  28800, // set this to 8 hours so we dont timeout on big files
		  CURLOPT_URL     => 'http://php.net/manual/en/book.pdf.php',
		);
		
		$ch = curl_init();
		curl_setopt_array($ch, $options);
		curl_exec($ch);
		curl_close($ch);*/
		echo "Uploaded";
		
		
		
	}
	

	
}