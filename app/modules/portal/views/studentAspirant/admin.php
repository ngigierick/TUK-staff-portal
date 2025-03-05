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
	'id' => 'student-aspirant-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'type'=>'striped bordered condensed',
	'columns' => array(
		'id',
		'reg_number',
		array(
				'name'=>'academicyear_id',
				'value'=>'GxHtml::valueEx($data->academicyear)',
				'filter'=>GxHtml::listDataEx(Academicyear::model()->findAllAttributes(null, true)),
				),
		'id_number',
		array(
				'name'=>'gender_id',
				'value'=>'GxHtml::valueEx($data->gender)',
				'filter'=>GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)),
				),
		'surname',
		/*
		'firstname',
		'othername',
		array(
				'name'=>'school_id',
				'value'=>'GxHtml::valueEx($data->school)',
				'filter'=>GxHtml::listDataEx(School::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'department_id',
				'value'=>'GxHtml::valueEx($data->department)',
				'filter'=>GxHtml::listDataEx(Department::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'programme_id',
				'value'=>'GxHtml::valueEx($data->programme)',
				'filter'=>GxHtml::listDataEx(Programme::model()->findAllAttributes(null, true)),
				),
		'programme_end',
		'mobile',
		'email',
		'photo',
		'ag_id_number',
		'ag_gender_id',
		'ag_surname',
		'ag_firstname',
		'ag_othername',
		'ag_school_id',
		'ag_department_id',
		'ag_programme_id',
		'ag_programme_end',
		'ag_mobile',
		'ag_email',
		'ag_photo',
		'status',
		'date_modified',
		*/
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
		),
	),
)); ?>
