<?php

$this->breadcrumbs = array(
	SalaryScale::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . SalaryScale::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . SalaryScale::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(SalaryScale::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 