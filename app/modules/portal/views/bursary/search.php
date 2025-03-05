<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'bursary-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	

	
	
		<fieldset>
		<legend>Getting started...</legend>
		
		<div class="notes">Start by entering your registration number</div>
		
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
		'icon'=>'forward',
		'label'=>'Proceed',
	)); ?>
</div>
<?php	
$this->endWidget();
?>

