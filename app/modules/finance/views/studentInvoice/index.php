<?php

$this->breadcrumbs = array(
	StudentInvoice::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create New') . ' ' . StudentInvoice::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . StudentInvoice::label(2), 'url' => array('admin')),
);
?>

<h1>Listing of <?php echo GxHtml::encode(StudentInvoice::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 