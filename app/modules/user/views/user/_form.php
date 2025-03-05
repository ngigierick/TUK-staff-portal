

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'user-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<?php $model->password ='';?>
		<?php echo $form->dropDownListRow($model, 'role_id', GxHtml::listDataEx(Role::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
		
		<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 255)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'email', array('maxlength' => 255)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'password', array('maxlength' => 255)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'pf_number', array('maxlength' => 255)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'id_number', array('maxlength' => 255)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'designation', array('maxlength' => 255)); ?>
		
		<?php echo $form->textFieldRow($model, 'username', array('maxlength' => 20)); ?>
		
		<?php echo $form->checkBoxRow($model, 'ip_login');?>
		
		<?php echo $form->textFieldRow($model, 'ip_address', array('maxlength' => 20)); ?>
  		
		<?php if(($model->isNewRecord) || (empty($model->photo))):?>
		<?php echo $form->fileFieldRow($model, 'photo'); ?>
		<?php else:?>
		<div  id="fixed">
		<?php echo CHtml::image(Yii::app()->baseUrl.'/images/users/'.$model->photo,"image",array("width"=>200)); ?>  
		<?php echo CHtml::hiddenField('photo',$model->photo); ?>
		</div>
		<?php echo CHtml::checkBox('covered',false, array('class'=>'change'));?> <?php echo $form->labelEx($model,'changephoto');?>
		<div id="photo" style="display:none">
		<?php echo $form->fileFieldRow($model, 'photo', array('maxlength' => 30)); ?>
		</div>
		<?php
			Yii::app()->clientScript->registerScript('show', "
				$('.change').click(function(){
					$('#fixed, #photo').toggle();
			});
			");
		?>
		<?php endif;?>
		

	
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
<?php	
$this->endWidget();
?>
