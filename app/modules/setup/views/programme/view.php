<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>

<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List all') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create new') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update this') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete this') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode($model->name); ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(
'id',
'name',
array(
			'name' => 'department',
			'type' => 'raw',
			'value' => $model->department !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->department)), array('department/view', 'id' => GxActiveRecord::extractPkValue($model->department, true))) : null,
			),
'code',
array(
			'name' => 'type',
			'type' => 'raw',
			'value' => $model->type !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->type)), array('programmetype/view', 'id' => GxActiveRecord::extractPkValue($model->type, true))) : null,
			),
array(
			'name' => 'duration',
			'type' => 'raw',
			'value' => $model->duration !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->duration)), array('programmeduration/view', 'id' => GxActiveRecord::extractPkValue($model->duration, true))) : null,
			),
'notes',
'requirements',
'date_modified',
'status_id',
	),
)); ?>

