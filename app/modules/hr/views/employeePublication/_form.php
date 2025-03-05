

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-publication-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="control-group">
		<div class="control-label required">
		Publication Title
		<span class="required">*</span>
		</div>
		<div class="controls">
		<?php echo $form->textArea($model,'title',array('rows'=>5, 'cols'=>3000)); ?>
		
		</div>
		</div>
		
		<div class="control-group">
		<div class="control-label required">
		Link to the Publication
		<span class="required">*</span>
		</div>
		<div class="controls">
		<?php echo $form->textArea($model,'link',array('rows'=>7, 'cols'=>1000)); ?>
		<span class="notes">e.g. http://www.examplejournal.com/category/id/myId </span> 
		</div>
		
		</div>
		
		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
		
		
		
	
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'icon'=>'ok',
		'size'=>'small',
		'type'=>'success',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		
		'type'=>'warning',
		'size'=>'small',
		'icon'=>'remove',
		'url' => array('//portal/profile/view'),
		'label'=>'Cancel',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>