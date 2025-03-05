<?php if (isset($view)):?>
<h1><?php echo $view;?></h1>
<?php else:?>
<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
<?php endif;?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Create '.$model->label(),
    //'type'=>'info', 
    'size'=>'small', 
	'icon'=>'plus',
	'url'=>array('create'),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Update this '.$model->label(),
    //'type'=>'info', 
    'size'=>'small', 
	'icon'=>'edit',
	'url'=>array('update','id'=>$model->id),
)); ?>

<?php if (isset($resetPassword)):?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'Reset password for this '.$model->label(),
		//'type'=>'info', 
		'size'=>'small', 
		'icon'=>'lock',
		'htmlOptions' => array(
				'confirm'=>'Are you sure you want to reset password for this '.$model->label().'?',
		),
		'url'=>array('password','id'=>$model->id),
	)); ?>
<?php endif;?>


<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'View other '.$model->label(2),
    //'type'=>'info', 
    'size'=>'small', 
	'icon'=>'list',
	'url'=>array('admin'),
)); ?>


<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Delete this '.$model->label(),
    //'type'=>'info', 
    'size'=>'small', 
	'icon'=>'remove',
	'url'=>array('delete','id'=>$model->id),
	'htmlOptions' => array(
				'confirm'=>'Are you sure you want to delete this '.$model->label().'?',
	),
)); ?>
<br /><br />