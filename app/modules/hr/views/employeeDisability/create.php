<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);

/*$this->menu = array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);*/
?>

<fieldset>
<legend>
<h1>Enter Disability Information for 
<?php echo GxHtml::valueEx($staff->title).' '.GxHtml::encode($staff->surname.' '.$staff->firstname.' '.$staff->othername.' ('.$staff->pf_number.')');?> 
</h1>
</legend>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>
