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

<h1>Student Management System | The Kenya Polytechnic University College</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'institution-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'description',
		'postal_address',
		'physical_address',
		'telephone',
		/*
		'email',
		'fax',
		'photo',
		'date_modified',
		*/
		array(
			'class' => 'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>