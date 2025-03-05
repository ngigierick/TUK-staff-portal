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




<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'well'),
)); 




?>

<h1>Print Registration Form for a Student</h1>
<hr />
<div class="notes"><i class="icon-flag"> </i>
This is an autocomplete field. Enter the student registration number by entering just part of the registration number e.g for ABBQ/00001/2013, you can just type 00001 and you will be 
provided will a list of possible 00001 registration numbers where you select the correct registration number.
</div>
<table>
<tr>
<td>
<?php echo $form->labelEx($model,'reg_number'); ?>
</td>
<td>
<?php echo $form->textField($model,'reg_number'); ?>

<?php //echo $form->textFieldRow($model, 'programme_id', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
</td>
</tr>
<tr>
<td>
</td>
<td>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary','icon'=>'print','size'=>'large','label'=>'PRINT FORM')); ?>
</td>
</tr>
</table>
<?php $this->endWidget(); ?>

