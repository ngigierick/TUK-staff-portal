<?php
/* @var $this MailboxController */
/* @var $model Mailbox */

$this->breadcrumbs=array(
	'Mailboxes'=>array('index'),
	$model->id,
);


?>

<h1><?php echo $model->subject; ?></h1>
<h4>From: <span class="brown"> <?php echo $model->sender; ?></span> On: <span class="brown"> <?php echo date('g:ia \o\n l jS F Y',$model->date_created); ?></span> <i>(<?php echo $model->status_id; ?>)</i></h4>
<hr/>

<?php foreach( $parent_mails as $mail ):?>
<h4> <span class="brown"> <?php echo date('g:ia \o\n l jS F Y',$mail->date_created); ?></span></h4>
<i><?php echo $mail->sender; ?>: </i><b><?php echo $mail->body;?></b>
<br/><br/>
<?php endforeach;?>

<br/><br/>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Reply Message',
    'type'=>'success', 
    'size'=>'small',
	'icon'=>'backward',	
	'url'=>array('reply', 'id'=>$model->id),
)); 
?>

<br/><br/><hr />
<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		//array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Go to Dashboard'), 
				'url'=>array('//courseApplication/default/profile'),
				'icon'=>'user',						
				'visible'=>(!empty(Yii::app()->user->id)),
				),
		array('label'=>Yii::t('app', 'Back to Mail Messages'), 
				'url'=>array('//courseApplication/personalDetails/mailbox'),
				'icon'=>'envelope',						
				'visible'=>(!empty(Yii::app()->user->id)),
				),
		'',
	),

));?>

