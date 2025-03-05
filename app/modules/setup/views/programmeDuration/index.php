<?php

$this->breadcrumbs = array(
	ProgrammeDuration::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create New') . ' ' . ProgrammeDuration::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . ProgrammeDuration::label(2), 'url' => array('admin')),
);
?>

<h1>Listing of <?php echo GxHtml::encode(ProgrammeDuration::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 