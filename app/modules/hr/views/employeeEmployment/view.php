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
			'name' => 'pfNumber',
			'type' => 'raw',
			'value' => $model->pfNumber !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->pfNumber)), array('employee/view', 'id' => GxActiveRecord::extractPkValue($model->pfNumber, true))) : null,
			),
array(
			'name' => 'position',
			'type' => 'raw',
			'value' => $model->position !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->position)), array('position/view', 'id' => GxActiveRecord::extractPkValue($model->position, true))) : null,
			),
array(
			'name' => 'grade',
			'type' => 'raw',
			'value' => $model->grade !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->grade)), array('grade/view', 'id' => GxActiveRecord::extractPkValue($model->grade, true))) : null,
			),
'd_start',
'd_end',
'increment_date',
array(
			'name' => 'salaryScale',
			'type' => 'raw',
			'value' => $model->salaryScale !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->salaryScale)), array('salaryScale/view', 'id' => GxActiveRecord::extractPkValue($model->salaryScale, true))) : null,
			),
'date_modified',
'category_id',
	),
)); ?>

