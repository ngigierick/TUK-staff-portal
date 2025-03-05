<?php

$this->breadcrumbs = array(
	Student::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create New') . ' ' . Student::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage the') . ' ' . Student::label(2), 'url' => array('admin')),
);
?>

<h1>Listing of <?php echo GxHtml::encode(Student::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 