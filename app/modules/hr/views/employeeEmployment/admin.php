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
	'id' => 'employee-employment-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		'id',
		array(
				'name'=>'pf_number',
				'value'=>'GxHtml::valueEx($data->pfNumber)',
				'filter'=>GxHtml::listDataEx(Employee::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'position_id',
				'value'=>'GxHtml::valueEx($data->position)',
				'filter'=>GxHtml::listDataEx(Position::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'grade_id',
				'value'=>'GxHtml::valueEx($data->grade)',
				'filter'=>GxHtml::listDataEx(Grade::model()->findAllAttributes(null, true)),
				),
		'd_start',
		'd_end',
		/*
		'increment_date',
		array(
				'name'=>'salary_scale_id',
				'value'=>'GxHtml::valueEx($data->salaryScale)',
				'filter'=>GxHtml::listDataEx(SalaryScale::model()->findAllAttributes(null, true)),
				),
		'date_modified',
		'category_id',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
