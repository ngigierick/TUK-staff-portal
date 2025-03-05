
<h1><?php echo $model->subject; ?></h1>
<h4>To: <span class="brown"> <?php echo $model->receiver; ?></span> On: <span class="brown"> <?php echo date('g:ia \o\n l jS F Y',$model->date_created); ?></span> <i>(<?php echo $model->status_id; ?>)</i></h4>
<hr/>

<?php foreach( $parent_mails as $mail ):?>
<h4> <span class="brown"> <?php echo date('g:ia \o\n l jS F Y',$mail->date_created); ?></span></h4>
<i><?php echo $mail->sender; ?>: </i><b><?php echo $mail->body;?></b>
<br/><br/>
<?php endforeach;?>



<br/><br/><br/>
<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		//array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Go to Dashboard'), 
				'url'=>array('//courseApplication/personalDetails/profile'),
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

