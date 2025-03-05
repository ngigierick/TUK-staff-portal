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
			'name' => 'relationship',
			'type' => 'raw',
			'value' => $model->relationship !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->relationship)), array('relationship/view', 'id' => GxActiveRecord::extractPkValue($model->relationship, true))) : null,
			),
'surname',
'firstname',
'othername',
'status:boolean',
'date_modified',
array(
			'name' => 'level',
			'type' => 'raw',
			'value' => $model->level !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->level)), array('employeeNokLevel/view', 'id' => GxActiveRecord::extractPkValue($model->level, true))) : null,
			),
	),
)); ?>

