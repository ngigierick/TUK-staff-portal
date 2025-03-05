<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);

?>

<h1><?php echo Yii::t('app', 'Create New') . ' ' . GxHtml::encode($model->label()); ?></h1>

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