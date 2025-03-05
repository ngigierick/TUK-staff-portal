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
			'name' => 'type',
			'type' => 'raw',
			'value' => $model->type !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->type)), array('ictEquipmentType/view', 'id' => GxActiveRecord::extractPkValue($model->type, true))) : null,
			),
'common_name',
'description',
'mac_address',
'date_modified:datetime',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('ictEquipmentAccesses')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->ictEquipmentAccesses as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('ictEquipmentAccess/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>