<?php

$this->breadcrumbs = array(
	Faculty::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create New') . ' ' . Faculty::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . Faculty::label(2), 'url' => array('admin')),
);
?>

<h1>Listing of <?php echo GxHtml::encode(Faculty::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 