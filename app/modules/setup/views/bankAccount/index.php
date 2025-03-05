<?php

$this->breadcrumbs = array(
	BankAccount::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create New') . ' ' . BankAccount::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . BankAccount::label(2), 'url' => array('admin')),
);
?>

<h1>Listing of <?php echo GxHtml::encode(BankAccount::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 