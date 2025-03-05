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
	'id' => 'employee-dependant-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		'id',
		array(
				'name'=>'pf_number',
				'value'=>'GxHtml::valueEx($data->pfNumber)',
				'filter'=>GxHtml::listDataEx(Staff::model()->findAllAttributes(null, true)),
				),
		'surname',
		'firstname',
		'othername',
		array(
				'name'=>'relationship_id',
				'value'=>'GxHtml::valueEx($data->relationship)',
				'filter'=>GxHtml::listDataEx(Relationship::model()->findAllAttributes(null, true)),
				),
		/*
		array(
				'name'=>'gender_id',
				'value'=>'GxHtml::valueEx($data->gender)',
				'filter'=>GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)),
				),
		'dob',
		'status',
		'date_modified',
		'photo',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
