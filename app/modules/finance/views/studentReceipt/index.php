<?php

$this->breadcrumbs = array(
	StudentReceipt::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create New') . ' ' . StudentReceipt::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . StudentReceipt::label(2), 'url' => array('admin')),
);
?>

<h1>Listing of <?php echo GxHtml::encode(StudentReceipt::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 