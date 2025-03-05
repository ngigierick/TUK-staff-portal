<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>


<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>



<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Create a '.$model->label(),
    'type'=>'info', 
    'size'=>'mini', 
	'url'=>array('create'),
)); ?>
	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'student-death-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		'id',
		array(
				'name'=>'reg_number',
				'value'=>'GxHtml::valueEx($data->regNumber)',
				'filter'=>GxHtml::listDataEx(Student::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'relation_id',
				'value'=>'GxHtml::valueEx($data->relation)',
				'filter'=>GxHtml::listDataEx(Relationship::model()->findAllAttributes(null, true)),
				),
		'affected_name',
		'burial_date',
		'burial_location',
		/*
		array(
				'name'=>'reg_number1',
				'value'=>'GxHtml::valueEx($data->regNumber1)',
				'filter'=>GxHtml::listDataEx(Student::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'reg_number2',
				'value'=>'GxHtml::valueEx($data->regNumber2)',
				'filter'=>GxHtml::listDataEx(Student::model()->findAllAttributes(null, true)),
				),
		'budget',
		'status',
		'date_modified',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
