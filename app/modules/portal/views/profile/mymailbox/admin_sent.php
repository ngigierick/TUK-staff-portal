<h1>Sent Items - My Mailbox</h1>

<hr />

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Send Us Mail',
    'type'=>'success', 
    'size'=>'small', 
	'icon'=>'pencil',
	'url'=>array('sendMail'),
)); 
?>
&nbsp;&nbsp;&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Inbox',
    'type'=>'info', 
    'size'=>'small', 
	'icon'=>'envelope',
	'url'=>array('mailbox'),
)); 
?>
&nbsp;&nbsp;&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Sent Items',
    'type'=>'danger', 
    'size'=>'small', 
	'icon'=>'envelope',
	'url'=>array('mailbox','id'=>'1'),
)); 
?>


<h2><?php echo $this->header;?></h2>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'institution-grid',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$mailbox,
	'filter'=>$model,
	'columns'=>array(
		'subject',
		'support',
		'status_id:html',
		'date_modified:datetime',
		array(
			'class' => 'bootstrap.widgets.TbGroupButtonColumn',
			 'template'=>'{view}',
			 'buttons'=>array(
             
					'view' => array(
					'label'=>'READ MESSAGE',
					'imageUrl'=>'',
					'url' => 'Yii::app()->createUrl("//portal/profile/viewMail", array("id"=>$data->id))',
					),
					
				),
		),
	),
)); ?>
<br/><br/>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Send New Mail'), 
				'url'=>array('//portal/profile/sendMail'),
				'icon'=>'pencil',						
				'visible'=>(!empty(Yii::app()->user->id)),
				),
		array('label'=>Yii::t('app', 'Go to Profile'), 
				'url'=>array('//portal/profile/view'),
				'icon'=>'user',						
				'visible'=>(!empty(Yii::app()->user->id)),
				),
		array('label'=>Yii::t('app', 'Back to Mail Messages'), 
				'url'=>array('//portal/profile/mailbox'),
				'icon'=>'envelope',						
				'visible'=>(!empty(Yii::app()->user->id)),
				),
		'',
	),

));?>

