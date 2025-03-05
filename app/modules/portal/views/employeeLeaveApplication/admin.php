<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
?>


<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1><hr />



<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Record  a Leave for Staff',
    'type'=>'info', 
    'size'=>'mini', 
    'icon'=>'pencil',
	'url'=>array('create'),
)); ?>
	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'employee-leave-application-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
	//	'id',
		array(
				'name'=>'leave_id',
				'value'=>'GxHtml::valueEx($data->leave)',
				'filter'=>GxHtml::listDataEx(EmployeeLeave::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'staff_id',
				'value'=>'GxHtml::valueEx($data->staff)',
				'filter'=>GxHtml::listDataEx(Employee::model()->findAllAttributes(null, true)),
				),
		'start_date',
		'end_date',
		'total_days',
		'taken_days',
		'rem_days',
		/*'status',
		array(
					'name' => 'is_latest',
					'value' => '($data->is_latest === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
		'date_modified',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
