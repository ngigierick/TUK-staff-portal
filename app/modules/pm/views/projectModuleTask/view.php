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
'name',
'content',
array(
			'name' => 'author',
			'type' => 'raw',
			'value' => $model->author !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->author)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->author, true))) : null,
			),
array(
			'name' => 'assigned',
			'type' => 'raw',
			'value' => $model->assigned !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->assigned)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->assigned, true))) : null,
			),
'start_date',
'end_date',
'completion_stage',
array(
			'name' => 'module',
			'type' => 'raw',
			'value' => $model->module !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->module)), array('projectModule/view', 'id' => GxActiveRecord::extractPkValue($model->module, true))) : null,
			),
'date_modified',
'status_id',
	),
)); ?>

