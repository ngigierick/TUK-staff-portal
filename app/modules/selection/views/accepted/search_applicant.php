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


<h1>Inter-Programme Transfer Panel</h1>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
)); 




?>
<fieldset>
<legend>Change Course for an Applicant</legend>
<div class="control-group">
<label class="control-label required">
Applicant Registration # 
</label>
<div class="controls">
<?php
		//autocomplete
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>'reg_number',
			'id'=>'reg_number',
			'source'=>$this->createUrl('/admission/student/showApplicants'),
			'options'=>array(
				'delay'=>300,
				'minLength'=>2,
				'showAnim'=>'fold',
			),
			'htmlOptions'=>array(
				'size'=>'40'
			),
		));
?>
</div>
</div>


<div class="control-group">
<label class="control-label required">
New Course Name 
</label>
<div class="controls">
<?php
		//autocomplete
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>'programme_id',
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
<?php echo $form->hiddenField($model, 'programme_id', array('maxlength' => 30,'id'=>'programmecode')); ?>
</div>
</div>
</fieldset>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Submit Changes',
	)); ?>
</div>
<?php	
$this->endWidget();
?>



