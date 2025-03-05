<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-doc-form',
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'category_id', GxHtml::listDataEx(DocType::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		<br />
		<?php echo $form->checkBoxRow($model, 'is_image');?>
		<br />
		<div class="control-group">
		<div class="control-label">
		<?php echo $form->labelEx($model,'file_name'); ?>
		</div>
		<div class="controls">
		<?php if(($model->isNewRecord) || (empty($model->file_name))):?>
		
		<?php echo $form->fileField($model, 'file_name', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'file_name'); ?>
		
		<?php else:?>
		<div class="row" id="fixed">
		<?php if ($model->is_image) echo CHtml::image(Yii::app()->baseUrl.'/images/staff/'.$model->file_name,"image",array("width"=>200)); 
			else echo $model->file_name;
		?>  
		<?php echo CHtml::hiddenField('file_name',$model->file_name); ?>
		</div>
		<?php echo CHtml::checkBox('covered',false, array('class'=>'change'));?> Change Document
		<div class="row">
		<div id="photo" style="display:none">
		Upload different file
		<?php echo $form->fileField($model, 'file_name', array('maxlength' => 30)); ?>
		</div>
		<?php
			Yii::app()->clientScript->registerScript('show', "
				$('.change').click(function(){
					$('#fixed, #photo').toggle();
			});
			");
		?>
		<?php endif;?>
		</div>
		</div>
		</div>
		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Upload' : 'Save',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
