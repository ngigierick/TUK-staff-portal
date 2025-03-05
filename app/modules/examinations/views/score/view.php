<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php	$this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'semester',
			'type' => 'raw',
			'value' => $model->semester !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->semester)), array('semester/view', 'id' => GxActiveRecord::extractPkValue($model->semester, true))) : null,
			),
array(
			'name' => 'studentReg',
			'type' => 'raw',
			'value' => $model->studentReg !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->studentReg)), array('student/view', 'id' => GxActiveRecord::extractPkValue($model->studentReg, true))) : null,
			),
array(
			'name' => 'courseUnit',
			'type' => 'raw',
			'value' => $model->courseUnit !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->courseUnit)), array('courseUnit/view', 'id' => GxActiveRecord::extractPkValue($model->courseUnit, true))) : null,
			),
array(
			'name' => 'examType',
			'type' => 'raw',
			'value' => $model->examType !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->examType)), array('examType/view', 'id' => GxActiveRecord::extractPkValue($model->examType, true))) : null,
			),
'year_of_study',
'semester_of_study',
'marks_obtained',
'marks_total',
'grade',
'status',
'remarks',
'date_modified:datetime',
	),
)); ?>

