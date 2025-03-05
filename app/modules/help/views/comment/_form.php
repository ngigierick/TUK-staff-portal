

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'comment-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->textArea($model, 'content'); ?>
		
		
		<?php echo $form->dropDownList($model, 'author_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textField($model, 'category_id'); ?>
		
		
		<?php echo $form->textField($model, 'date_added', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->dropDownList($model, 'status_id', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true))); ?>
		

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
