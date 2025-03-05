<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	"Applicant Selection",
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Applicant Selection Panel'), 'url' => array('/selection/accepted/selection')),
	array('label'=>Yii::t('app', 'Mass Applicant Approval'), 'url' => array('/selection/accepted/allapplicants')),
	array('label'=>Yii::t('app', 'Succesful Applicants '), 'url' => array('/selection/accepted/admin')),
	array('label'=>Yii::t('app', 'Successful Applicants with Contact Details'),'url' => array('/selection/accepted/list')),

);

?>
<h1>Applicant Selection</h1>

<p>
This is where the selection of different applicants is carried out. To proceed, select the programme and tick the applicants who have been successful
</p>
