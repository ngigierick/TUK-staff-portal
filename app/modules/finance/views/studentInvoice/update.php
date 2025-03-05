<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	$model->regNumber->programme,
	Yii::t('app', 'Update'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'List all') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label' => Yii::t('app', 'Create New') . ' ' . $model->label(), 'url'=>array('create')),
	array('label' => Yii::t('app', 'View this ') . ' ' . $model->label(), 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	array('label' => Yii::t('app', 'Manage the') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) .' for '.$model->regNumber->programme; ?></h1>

<?php
$this->renderPartial('_update', array(
		'model' => $model,
		'feeitems'=>$feeitems,
		));
?>