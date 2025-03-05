<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'institution-form',
	'enableAjaxValidation' => true,
	 'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model, 'description', array('maxlength' => 500)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'postal_address'); ?>
		<?php echo $form->textField($model, 'postal_address', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'postal_address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'physical_address'); ?>
		<?php echo $form->textField($model, 'physical_address', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'physical_address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model, 'telephone', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'telephone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model, 'fax', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'fax'); ?>
		</div><!-- row -->
		<?php echo $form->labelEx($model,'photo'); ?>
		<?php if(($model->isNewRecord) || (empty($model->photo))):?>
		<div class="row">
		<?php echo $form->fileField($model, 'photo', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'photo'); ?>
		</div><!-- row -->
		<?php else:?>
		<div class="row" id="fixed">
		<?php echo CHtml::image(Yii::app()->baseUrl.'/images/'.$model->photo,"image",array("width"=>200)); ?>  
		<?php echo CHtml::hiddenField('photo',$model->photo); ?>
		</div>
		<?php echo CHtml::checkBox('covered',false, array('class'=>'change'));?> <?php echo $form->labelEx($model,'changephoto');?>
		<div class="row">
		<div id="photo" style="display:none">
		<?php echo $form->labelEx($model,'changephotolabel');?>
		<?php echo $form->fileField($model, 'photo', array('maxlength' => 30)); ?>
		</div>
		<?php
			Yii::app()->clientScript->registerScript('show', "
				$('.change').click(function(){
					$('#fixed, #photo').toggle();
			});
			");
		?>
		<?php endif;?>


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->