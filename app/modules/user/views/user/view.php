<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

?>

<h1><?php echo Yii::t('app', 'View') . '  ' . GxHtml::encode($model->label()) . ' | ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<div class="profiles">
<?php if(!empty($model->photo)):?>
<?php echo CHtml::image(Yii::app()->baseUrl.'/images/users/'.$model->photo,'Passport photo',array('height'=>100)); ?>
<?php else:?>
<?php echo CHtml::image(Yii::app()->baseUrl.'/images/users/user.jpg','Passport photo',array('height'=>100)); ?>
<?php endif;?>
</div>
<br/>
<?php	$this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed bordered',
	'data' => $model,
	'attributes' => array(
array(
			'name' => 'role',
			'type' => 'raw',
			'value' => $model->role !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->role)), array('role/view', 'id' => GxActiveRecord::extractPkValue($model->role, true))) : null,
			),
'name',
'username',
'email',
'pf_number',
'id_number',
'designation',
'ip_address',
'ip_login',
'date_modified:datetime',
'last_login:datetime',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Ceate new') . ' ' . $model->label(), 
				'url'=>array('create'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(1),
				),
		array('label'=>Yii::t('app', 'Update Profile '), 
				'url'=>array('update', 'id' => $model->id),
				'icon'=>'edit',						
				'visible'=>(Yii::app()->user->id === $model->id || Yii::app()->user->checkAccess(1)),
				),
		array('label'=>Yii::t('app', 'Delete this') . ' ' . $model->label(), 
				'url'=>'#', 
				'icon'=>'trash',
				'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?'),
				'visible'=>Yii::app()->user->checkAccess(1),
				),
		array('label'=>Yii::t('app', 'Manage the') . ' ' . $model->label(2), 
				'url'=>array('admin'),
				'icon'=>'th',						
				'visible'=>Yii::app()->user->checkAccess(1),
				),
	),

));?>