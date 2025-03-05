<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);


?>

<h1><?php echo Yii::t('app', 'Enter new applicant fees details'); ?></h1>

<div class="notes">
This is where you capture fees for application for any programme/ course. Every course has its own application fees, and this is set by the academic registrar of the university. 
No application will be accepted without a valid receipt.
</div>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 
				'url'=>array('admin'),
				'icon'=>'th',						
				'visible'=>Yii::app()->user->checkAccess(2),
				),
	),

));?>