<?php

$this->breadcrumbs = array(
	Applicant::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create New') . ' ' . Applicant::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . Applicant::label(2), 'url' => array('admin')),
);
?>

<h1>Listing of <?php echo GxHtml::encode(Applicant::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 