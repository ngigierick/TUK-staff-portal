<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Create '.$model->label(),
    //'type'=>'info', 
    'size'=>'small', 
	'icon'=>'plus',
	'url'=>array('create'),
)); ?>