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
	'id' => 'bursary-grid',
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
		'date_created',
		'date_modified',
		'fee_balance',
		'guardian_status',
		/*
		'f_name',
		'f_id',
		'f_occupation',
		'm_name',
		'm_id',
		'm_occupation',
		'g_name',
		'g_id',
		'g_occupation',
		'fee_payment_plan',
		'fee_payment',
		'bursary_beneficiary',
		'beneficiary_amount',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
