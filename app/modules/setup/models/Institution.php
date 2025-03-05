<?php

Yii::import('application.modules.setup.models._base.BaseInstitution');

class Institution extends BaseInstitution
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public static function isoCertifiedMark(){
		$img = Yii::app()->linkManager->mediaBaseURL()."/general/tuk-iso.png";
		return CHtml::image($img ,'TUK ISO Image',array('width'=>250,'class'=>'iso'));
	}
	public static function logo(){
		$img = Yii::app()->linkManager->mediaBaseURL()."/general/logo.png";
		return CHtml::image($img ,'TUK Logo Image',array('width'=>400));
	}
	public static function contacts(){
		return"<br />
		P.O. Box 52428 - 00200<br />
		Nairobi- Kenya.<br />
		Located along Haile Selassie Avenue<br />
		Tel: +254(020) 2219929, 3341639, 3343672<br />
		Email:<br />
		General inquiries: info@tukenya.ac.ke<br />
		Feedback/Compalints/Suggestions : customercare@tukenya.ac.ke<br />
		Official Communication: vc@tukenya.ac.ke<br /> 
		";
	}
	//log the audit trail
	public function behaviors()
	{
		return array(
			'LoggableBehavior'=>
				'application.modules.auditTrail.behaviors.LoggableBehavior',
		);
	}
}