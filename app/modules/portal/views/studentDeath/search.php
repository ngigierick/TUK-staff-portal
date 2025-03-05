<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'bursary-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	

	
	
		<fieldset>
		<legend>Reporting Death and Funeral of Student</legend>
		<h4 class="warning">Be sure to have confirmed the death!</h4>
		<div class="notes">Enter the registration number of the diseased student</div>
		
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

