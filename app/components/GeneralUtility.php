<?php 
//component for general functions of the system
class GeneralUtility extends CApplicationComponent
{
   //user category whether staff,student or applicant
   private $_category;
   
   //handles site errors
   public function handleError($error,$controller){
	    $model=new Mailbox;	
	   //raise site error
		Yii::app()->utility->onSiteError = array(new UserActivity, 'recordSiteError');
		Yii::app()->utility->onSiteError(new CEvent($this));//record this error;
		$controller->render('error',array('error'=> $error,'model'=>$model));
   }
   
   /**
   * raises error for site
   */
	public function onSiteError($event){
		$this->raiseEvent('onSiteError', $event);
	}
	/**
	* redirect user to dashboard if already logged in_array
	*/
	public function redirectIfAlreadyLoggedIn($controller){
		if(isset(Yii::app()->user->id))	$controller->redirect(Yii::app()->createUrl('/user/user/dashboard'));
	}
	//start session
	public function startSession(){
		$session=new CHttpSession;
		$session->open();
		return $session;
	}
	//set user category
	public function setCategory($value){
        $this->_category=$value;
    }
	//get user category
	public function getCategory(){
        return $this->_category;
    }
	public function sendEmail($controller,$mail, $to, $subject, $message){
		$mail = $this->setSmtp($mail);
		$mail->render();
		$mail->From = 'portal@students.tukenya.ac.ke';
		$mail->FromName = 'TUK Mailer';
		$mail->AddAddress($to);
		$mail->Subject = $subject;
		//send
		if ($mail->Send()) {
			$mail->ClearAddresses();
			Yii::app()->user->setFlash('success','Thank you for contacting us. We will respond to you as soon as possible.');
			return true;
		} else {
			Yii::app()->user->setFlash('error','Error while sending email: '.$mail->ErrorInfo);
			return false;
		}
	}
	public function setSmtp($mail){
		$mail->IsSMTP();
		$mail->CharSet = 'UTF-8';
		$mail->SMTPSecure = 'tls';
		$mail->Host       = "smtp.googlemail.com"; // SMTP server example
		$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
		$mail->Username   = "portal@students.tukenya.ac.ke"; // SMTP account username
		$mail->Password   = "liege0admin!@#";        // SMTP account password
		return $mail;
	}
	function downloads(){
	  $l = Yii::app()->createUrl('//portal/page/download&file=');
	  $l2 = Yii::app()->utility->visitPageUrl(); 
	  return
	  '
	  <div class="span3 bordered-home">
		<div class="title1">Staff Special Downloads</div>
		<ul>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l2.'http://tukenya.ac.ke/sites/default/files/downloads/PERFORMANCE-APPRAISAL-2020.pdf" >	
			Management Approved Performance Appraisal 2020
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'wealth-declaration-2019.pdf" >	
			Circular for Wealth Declaration, 2019.
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l2.'http://tukenya.ac.ke/sites/default/files/downloads/PublicOfficerEthicsAct_PublicUniversitiesProcedures.pdf" >	
			The Public Officer Ethics Act, 2003
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'Public_Officer_Code_Of_Conduct.pdf" >	
			The Public Service Code of Conduct and Ethics, 2016
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l2.'http://tukenya.ac.ke/sites/default/files/downloads/PublicOfficerEthicsAct_PublicUniversitiesProcedures.pdf" >	
			The Public Officer Ethics Act, 2003
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l2.'http://tukenya.ac.ke/sites/default/files/downloads/section6-employment-act.pdf" >	
			Extract of the Employment Act No. 11 of 2007 Section 6
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l2.'http://tukenya.ac.ke/sites/default/files/downloads/TUK-sexual-harassment-policy.pdf" >	
			TUK Sexual Harassment Policy
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l2.'http://tukenya.ac.ke/sites/default/files/downloads/Internal-Complaints-Handling-Procedure.pdf" >	
			Internal Complaints Handling Procedure
			</a>
			</li>
			
			<li><i class="icon-download"></i> 
			<a href="'.$l.'tuk-leave-forms-revised-2017.pdf" >	
			Annual/Comp. Leave Form
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'maternity-and-paternity-leave-form.pdf" >	
			Maternity/Paternity Leave Form
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'tuk-staff-movement-advice-2017.pdf" >	
			Staff Movement Advice
			</a>
			</li>
			
			<li><i class="icon-download"></i> 
			<a href="'.$l.'Appraisal Grade I-IV.pdf" >	
			Staff Appraisal Grade I-IV
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'Appraisal Grade V_X TUK.pdf" >	
			Staff Appraisal Grade V-X
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'SPAF2_SENIOR ADMINISTRATIVE AND LIBRARY STAFF.pdf" >	
			Staff Appraisal Senior Administrative and Library Staff 
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'SPAF4_TEACHING STAFF APPRAISAL.pdf" >	
			Appraisal for Teachning Staff
			</a>
			</li>
			
			<li><i class="icon-download"></i> 
			<a href="'.$l.'TUK-personal-details-form-new.pdf" >	
			Personal Details Form
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'2017-2018-Values-and-Principles-Compliance-Evaluation-Report-Template.pdf" >	
			2017-2018 Values and Principles Compliance Evaluation Report Template
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'tuk-wealth-declaration-form.pdf" >	
			Wealth Declaration Form
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'exit-notification.pdf" >	
			Staff Notification of Exit Form
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'clearance-form.pdf" >	
			Staff Clearance Form
			</a>
			</li>
			<li><i class="icon-download"></i> 
			<a href="'.$l.'death-claim-form.pdf" >	
			Death Claim Form
			</a>
			</li>
		</ul>
	</div>
	  ';
  }
  public function privateDataUrl(){
	  return "https://media.tukenya.ac.ke/index.php?r=site";
  }
  public function apiKey(){
	  return "999connxEquity3102key172tukmedia";
  }
  public function displayPrivateImage($controller,$url,$div){
	  UserActivity::record('view','Viewed private photo url'.$url);
	  $controller->renderPartial(
	  "//site/common/media_file",
	  array(
	  'link'=>$this->privateDataUrl().'/getPhoto',
	  'key'=>$this->apiKey(),
	  'url'=>$url,
	  'div'=>$div));
  }
  public function downloadPrivateFileLink($location='intake/images/passports/',$file){
		return Yii::app()->createUrl("//intake/applicant/downloadFile",array("location"=>$location,"file"=>$file));
  }
  public function downloadPrivateFile($url){
	  UserActivity::record('view','Downloaded private file url - '.$url);
	 header("Location: ".$this->privateDataUrl()."/getFile&key=".$this->apiKey()."&url=".$url);
  }
  public function visitPageUrl(){
	return Yii::app()->createUrl('//portal/page/visitPage&url=');
  }
  public function visitPage($url){
	  UserActivity::record('view','Visited website of url - '.$url);
	 header("Location: ".$url);
  }
  public function socialMediaLinks($controller){
	   $l = $this->visitPageUrl();
	  $controller->widget('application.extensions.socialLink.socialLink', array(
			    'style'=>'right', //alignment - left, right
			    'top'=>'10',  //in percentage
			        'media' => array(
			        'facebook'=>array(
			            'url'=>$l.'http://www.facebook.com/pages/Technical-University-of-Kenya/521080071256112?ref=hl',
			            'target'=>'_blank',
			        ),
			        'twitter'=>array(
			            'url'=>$l.'http://www.twitter.com/TU_Kenya',
			            'target'=>'_blank',
			        ),
			        'google-plus'=>array(
			            'url'=>$l.'http://www.youtube.com/channel/UCIXSdHCnWl8DIzvyjzFuMJw',
			            'target'=>'_blank',
			        ),
			       
			      )
			));
  }
}
?>