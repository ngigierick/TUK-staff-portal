<?php

$this->breadcrumbs = array(
	FeeCategory::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create New') . ' ' . FeeCategory::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . FeeCategory::label(2), 'url' => array('admin')),
);
?>

<h1>Listing of <?php echo GxHtml::encode(FeeCategory::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 