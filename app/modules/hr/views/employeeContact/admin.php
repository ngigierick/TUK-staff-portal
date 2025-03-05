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
	'id' => 'employee-contact-grid',
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
		'home',
		array(
				'name'=>'nationality_id',
				'value'=>'GxHtml::valueEx($data->nationality)',
				'filter'=>GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'county_id',
				'value'=>'GxHtml::valueEx($data->county)',
				'filter'=>GxHtml::listDataEx(County::model()->findAllAttributes(null, true)),
				),
		'postal_address',
		/*
		'postal_code',
		'town',
		'office_telephone',
		'mobile',
		'email',
		'date_modified',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
