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
'start_date',
'end_date',
'completion_stage',
'date_modified',
array(
			'name' => 'status',
			'type' => 'raw',
			'value' => $model->status !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->status)), array('status/view', 'id' => GxActiveRecord::extractPkValue($model->status, true))) : null,
			),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Create New Task for this Module',
    'type'=>'success', 
    'size'=>'mini', 
    'icon'=>'plus',
	'url'=>array('//pm/projectModuleTask/create','id'=>$model->id),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('projectModuleTasks')); ?> Under <?php echo $model->name;?></h2>
<hr />
<?php
	echo GxHtml::openTag('ul');
	foreach($model->projectModuleTasks as $relatedModel) {
		echo GxHtml::openTag('li');
		echo $relatedModel->name.' | '.GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('//pm/projectModuleTask/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo '<hr/>';
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>