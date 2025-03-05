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


<h1>Choose Course/ Programme for Selection</h1>

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
<?php echo $form->labelEx($model,'academicyear_id'); ?>
</td>
<td>
	<?php
			$models = AcademicYear::model()->findAll(array('order' => 'id DESC'));
	?>
<?php echo $form->dropDownList($model, 'academicyear_id', GxHtml::listDataEx($models),array('prompt'=>'Select one')); ?>
<?php echo $form->error($model,'academicyear_id'); ?>
</td>
</tr>
<tr>
<td>
<?php echo $form->labelEx($model,'programme_id'); ?>
</td>
<td>
<?php
					//autocomplete
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
<?php echo $form->hiddenField($model, 'programme_id', array('maxlength' => 30,'id'=>'programmecode')); ?>
<?php //echo $form->textFieldRow($model, 'programme_id', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
</td>
</tr>
<tr>
<td>
</td>
<td>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'PROCEED')); ?>
</td>
</tr>
</table>
<?php $this->endWidget(); ?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
    'items'=>array(
		array('label'=>'APPLICATION NAVIGATION LINKS'),
		array('label'=>Yii::t('app', 'Mass selection Panel'), 
				'url'=>array('allapplicants'),
				'icon'=>'pencil',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
		array('label'=>Yii::t('app', 'Manage the Successful Applicants'), 
				'url'=>array('admin'),
				'icon'=>'th',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
		array('label'=>Yii::t('app', 'Successful Applicants with Contacts'), 
				'url'=>array('list'),
				'icon'=>'th',						
				'visible'=>Yii::app()->user->checkAccess(3),
				),
	),

));?>

