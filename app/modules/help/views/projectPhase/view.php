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
//'id',
'name',
'content:html',
'date_added:datetime',
'date_modified:datetime',
array(
			'name' => 'status',
			'type' => 'raw',
			'value' => $model->status !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->status)), array('status/view', 'id' => GxActiveRecord::extractPkValue($model->status, true))) : null,
			),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Create New Activity for this Phase',
    'type'=>'success', 
    'size'=>'mini', 
	'url'=>array('//help/projectActivity/create','id'=>$model->id),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('projectActivities')); ?> Under <?php echo $model->name;?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->projectActivities as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('projectActivity/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo '<hr/>';
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>