<?php
/* @var $this MailboxController */
/* @var $model Mailbox */

$this->breadcrumbs=array(
	'Mailboxes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mailbox', 'url'=>array('index')),
	array('label'=>'Create Mailbox', 'url'=>array('create')),
	array('label'=>'Update Mailbox', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mailbox', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mailbox', 'url'=>array('admin')),
);
?>

<h1>View Mailbox #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'from_id',
		'to_id',
		'subject',
		'body',
		'status_id',
		'date_modified',
	),
)); ?>
