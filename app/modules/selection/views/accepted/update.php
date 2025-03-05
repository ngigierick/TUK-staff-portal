<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	$model->surname => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Update'),
);


?>

<h1><?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode($model->surname.' '.$model->firstname.' '.$model->othername); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>
