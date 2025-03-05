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
	'id' => 'salary-scale-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		//'id',
		'step',
		array(
				'name'=>'grade_id',
				'value'=>'GxHtml::valueEx($data->grade)',
				'filter'=>GxHtml::listDataEx(Grade::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'category_id',
				'value'=>'GxHtml::valueEx($data->category)',
				'filter'=>GxHtml::listDataEx(EmployeeCategory::model()->findAllAttributes(null, true)),
				),
		'basic_salary',
		'house_allowance',
		'status',
		'date_modified:datetime',
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
