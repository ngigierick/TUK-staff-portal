<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'bursary-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	

	
	
		<fieldset>
		<legend>Make a request to your Polling Station Agent</legend>
		
		<p><b>NOTE: Please contact your agent and let him/ her accept your request after which he/ she should print a form and submit to the Office of the Director, Student Support Services.</b></p>
		<br/><br/>
		<?php
		$this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>true, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
		'alerts'=>array( // configurations per alert type
			'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
		),
		)
		); 
		?>
	
		<?php echo $form->textFieldRow($model, 'reg_number', array('maxlength' => 100)); ?>
		
		</fieldset>
		
				
		

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'large',
		'icon'=>'envelope',
		'label'=>'Send Request',
	)); ?>
</div>
<?php	
$this->endWidget();
?>

