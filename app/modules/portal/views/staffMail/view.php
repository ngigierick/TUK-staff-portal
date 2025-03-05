	<?php
	 $this->widget('bootstrap.widgets.TbAlert', array(
	        'block'=>true, // display a larger alert block?
	        'fade'=>true, // use transitions?
	        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
	        'alerts'=>array( // configurations per alert type
	            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
				 'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
				 'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
				 'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
	        ),
		)
	); 
	
	?>
<h1><?php echo $model->subject; ?></h1>
<h4>From: <span class="brown"> <?php echo $model->sender; ?></span> On: <span class="brown"> <?php echo $model->date_created; ?></span> <i>(<?php echo $model->status(); ?>)</i></h4>

<?php foreach( $parent_mails as $mail ):?>
<?php if (isset($mail->date_created)):?>
	<h4> <span class="brown"> <?php echo $mail->date_created; ?></span></h4>
	<i><?php echo $mail->sender; ?>: </i><b><?php echo $mail->body;?></b>
	<br/>
<?php endif;?>
<?php endforeach;?>

<br/><br/>
<?php if ($model->leaveForApproval()):?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'Reject',
		'type'=>'danger', 
		'size'=>'small', 
		'icon'=>'thumbs-down', 
		'url'=>array('approve', 'id'=>$model->id,'st'=>1),
		'htmlOptions'=>array('confirm'=>'Are you sure you want to reject this application?'),
)); 
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'Approve',
		'type'=>'success', 
		'size'=>'small', 
		'icon'=>'ok', 
		'url'=>array('approve', 'id'=>$model->id,'st'=>2),
)); 
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php endif;?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'View Mails',
		'type'=>'info', 
		'size'=>'small', 
		'icon'=>'envelope', 
		'url'=>array('admin'),
)); 
?>

