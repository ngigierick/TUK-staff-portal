<fieldset>
<legend>Kindly Answer this Question to Authorize Your Access</legend>
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


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'user-form',
	'type'=> 'horizontal',	
));?>

<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
	   ),
	)
); 

?>
<p><b><?php echo $model->securityQuestion->question;?></b></p>
<div class="control-group">
		<label class="control-label">
			
		</label>
	<div class="controls">
		<?php echo $form->passwordField($model, 'security_answer', array('prepend'=>'<i class="icon-lock"></i>','maxlength' => 255,'value'=>'','autocomplete'=>"off")); ?>
		<input type="hidden" name="page" value="<?php echo $page;?>>" />
	</div>
</div>



<br />
<div class="control-group hint">
<label class="control-label">
</label>
<div class="controls">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'warning',
		'size'=>'medium',
		'icon'=>'forward',
		'label'=>'Proceed',
	)); ?>


<?php $this->endWidget(); ?>
</div>
</fieldset>
