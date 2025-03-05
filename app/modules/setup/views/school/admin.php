<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?><?php
$this->menu = array(
	array('label' => Yii::t('app', 'List all') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label' => Yii::t('app', 'Create New') . ' ' . $model->label(), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'school-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'code',
		array(
				'name'=>'faculty_id',
				'value'=>'GxHtml::valueEx($data->faculty)',
				'filter'=>GxHtml::listDataEx(Faculty::model()->findAllAttributes(null, true)),
				),
		'notes',
		'date_modified',
		/*
		'status_id',
		*/
		array(
			'class' => 'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>