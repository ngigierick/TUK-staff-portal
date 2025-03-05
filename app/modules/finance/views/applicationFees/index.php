<?php

$this->breadcrumbs = array(
	ApplicationFees::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create New') . ' ' . ApplicationFees::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . ApplicationFees::label(2), 'url' => array('admin')),
);
?>

<h1>Listing of <?php echo GxHtml::encode(ApplicationFees::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 