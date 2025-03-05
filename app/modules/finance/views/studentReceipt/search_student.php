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


<h1>Student Finance - Fee Payment Office</h1>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'well'),
)); 




?>
<table>
<tr>
<td>
<?php echo $form->labelEx($model,'reg_number'); ?>
</td>
<td>
<?php
		//autocomplete
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>'student_reg',
			'id'=>'prog_code',
			'source'=>$this->createUrl('/admission/student/showStudent'),
			'options'=>array(
				'delay'=>300,
				'minLength'=>2,
				'showAnim'=>'fold',
				'select'=>"js:function(event, ui) {
					$('.placeholder').html(ui.item.id);
					//$('#code').val(ui.item.code);
				}"
			),
			'htmlOptions'=>array(
				'size'=>'40'
			),
		));
?>
</td>
<td>
<span class="placeholder">Student name will be displayed here</span>
<?php echo CHtml::hiddenField('stud',1);?>
</td>
<td>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'PROCEED')); ?>
</td>
</tr>
</table>
<?php $this->endWidget(); ?>



