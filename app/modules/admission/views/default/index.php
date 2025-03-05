<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	"Student Admission",
	);
?><?php
$this->menu = array(
	array('label' => Yii::t('app', 'Verify Admission Requirements'), 'url'=>array('student/verify')),
	array('label' => Yii::t('app', 'Manage admission'), 'url'=>array('student/admin')),
	array('label' => Yii::t('app', 'Admit new student'), 'url'=>array('student/admit')),
);
?>
<h1>Student Admission</h1>

<p>
This is the module to manage admission of student.
</p>
