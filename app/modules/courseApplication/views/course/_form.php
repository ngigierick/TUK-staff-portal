<h1>APPLICATION FOR 2014 SEPTEMBER INTAKE </h1>
<br />
<h3>Choose Course to Apply</h3>
<hr />
<div class="notes">
Kindly note that this is an autocomplete form, just type the name of the course then pick the one of your choice from the options shown. 
If you are unable to see the options, then, we may not have that course offered by us.
</div>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'role-form',
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
));
?>

<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 
?>
<div class="control-group">
	<div class="control-label">
		Course Applied for:
		
		</div>
		<div class="controls">
		<?php
			//autocomplete
			$model->programme_id = '';
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model'=>$model,
				'attribute'=>'programme_id',
				'id'=>'prog_code',
				'source'=>$this->createUrl('/finance/applicationFees/autocomplete'),
				'options'=>array(
					'delay'=>300,
					'minLength'=>2,
					'showAnim'=>'fold',
					'select'=>"js:function(event, ui) {
						$('#programmecode').val(ui.item.id);
						//$('#code').val(ui.item.code);
					}"
				),
				'htmlOptions'=>array(
					'size'=>'40'
				),
			));
		?>
		<span class="notes">Type course like electrical, mechanical, computer, sales, marketing, commerce, community development, etc,</span> 
		<?php echo $form->hiddenField($model, 'programme_id', array('maxlength' => 30,'id'=>'programmecode')); ?>
	</div>
</div>
<br />
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'large',
		'icon'=>'ok',
		'label'=>'Confirm Choice of Course',
	)); ?>
	&nbsp;&nbsp;&nbsp;
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'size'=>'large','label'=>'Reset Details')); ?>
</div>
</fieldset>
<?php	
$this->endWidget();
?>