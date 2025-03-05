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
	'id' => 'course-class-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'code',
		array(
				'name'=>'module_id',
				'value'=>'GxHtml::valueEx($data->module)',
				'filter'=>GxHtml::listDataEx(Module::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'department_id',
				'value'=>'GxHtml::valueEx($data->department)',
				'filter'=>GxHtml::listDataEx(Department::model()->findAllAttributes(null, true)),
				),
		'start_year',
		/*
		'start_term',
		'duration',
		'no_of_terms',
		'pattern',
		'date_modified',
		'status_id',
		*/
		array(
			'class' => 'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>