<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	$model->surname.' '.$model->firstname.' '.$model->othername => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Update'),
);
?>

<h1><?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode($model->salutation.' '.$model->surname.' '.$model->firstname.' '.$model->othername); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Enter new') . ' ' . $model->label(), 
				'url'=>array('create'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
		array('label'=>Yii::t('app', 'Delete this') . ' ' . $model->label(), 
				'url'=>'#', 
				'icon'=>'trash',
				'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?'),
				'visible'=>Yii::app()->user->checkAccess(1),
				),
		array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 
				'url'=>array('admin'),
				'icon'=>'th',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
	),

));?>