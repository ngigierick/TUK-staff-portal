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
'step',
array(
			'name' => 'grade',
			'type' => 'raw',
			'value' => $model->grade !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->grade)), array('grade/view', 'id' => GxActiveRecord::extractPkValue($model->grade, true))) : null,
			),
array(
			'name' => 'category',
			'type' => 'raw',
			'value' => $model->category !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->category)), array('employeeCategory/view', 'id' => GxActiveRecord::extractPkValue($model->category, true))) : null,
			),
'basic_salary',
'house_allowance',
'status',
'date_modified',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('employeeEmployments')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->employeeEmployments as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('employeeEmployment/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>