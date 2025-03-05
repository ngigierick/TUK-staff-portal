<?php
/* @var $this MailboxController */
/* @var $model Mailbox */



?>

<h1>Reply Mail | <?php echo $mail->subject; ?></h1>
<?php foreach( $parent_mails as $mail ):?>
<h4> <span class="brown"> <?php echo date('g:ia \o\n l jS F Y',$mail->date_created); ?></span></h4>
<i><?php echo $mail->sender; ?>: </i><b><?php echo $mail->body;?></b>
<br/><br/>
<?php endforeach;?>

<?php echo $this->renderPartial('mymailbox/reply/_form', array('model'=>$model,'mail'=>$mail)); ?>

<hr/>
<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		//array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Go to Dashboard'), 
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