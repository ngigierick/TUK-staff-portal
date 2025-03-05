<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Programme Intake/ Application',
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Manage Application Fees'), 'url' => array('/intake/applicationFees/admin')),
	array('label'=>Yii::t('app', 'Manage Applicant Enrollment'), 'url' => array('/intake/applicant/admin')),
);

?>
<h1>Programme Intake/ Application</h1>

<p>
This is where you can submit application fees and also enroll an applicant for a particular programme/course
</p>
