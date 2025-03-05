

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'horizontal',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 

?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
		
		<?php $model->reg_number= $student->reg_number;?>
		<?php $model->affected_name= $student->surname.' '.$student->firstname.' '.$student->othername;?>
		<?php $model->relation_id=13;//self?>
		<?php $model->reporter_id=Yii::app()->user->id;//self?>
		<?php $model->status = $model->isNewRecord ? 0 : $model->status;?>
		<?php $model->budget = $model->isNewRecord ? 0 : $model->budget;?>
		<?php echo $form->hiddenField($model, 'reg_number'); ?>
		<?php echo $form->hiddenField($model, 'relation_id'); ?>
		<?php echo $form->hiddenField($model, 'affected_name'); ?>
		<?php echo $form->hiddenField($model, 'reporter_id'); ?>
		<?php echo $form->hiddenField($model, 'status'); ?>
		<?php echo $form->hiddenField($model, 'budget'); ?>
		<fieldset>
		
		
	<legend>Part I - Scan and upload recent COLOURED passport size photo of the Diseased (Should not exceed 200px by 200px) </legend>
	<table>
	<tr>
	<td>
	<?php echo $form->labelEx($model,'photo'); ?>
	</td>
	<td>
	<?php if(($model->isNewRecord) || (empty($model->photo))):?>
		<div class="row">
		<?php echo $form->fileField($model, 'photo', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'photo'); ?>
		</div><!-- row -->
		<?php else:?>
		<div class="row" id="fixed">
		<?php echo CHtml::image(Yii::app()->baseUrl.'/images/passports/'.$model->photo,"image",array("width"=>200)); ?>  
		<?php echo CHtml::hiddenField('photo',$model->photo); ?>
		</div>
		<?php echo CHtml::checkBox('covered',false, array('class'=>'change'));?> <?php echo $form->labelEx($model,'changephoto');?>
		<div class="row">
		<div id="photo" style="display:none">
		New passport photo 
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
		 
		</div>
		
	</td>
	</tr>
	</table>
		
		<legend>Part II - Parents' Details</legend>
		
		
		<?php echo $form->textFieldRow($model, 'father_name', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'mother_name', array('maxlength' => 100)); ?>
		
		</fieldset>
		
		<fieldset>
			<legend>Funeral/ Burial Information</legend>
		
		
		<?php echo $form->datePickerRow($model, 'burial_date', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'burial_location', array('maxlength' => 100)); ?>
		
		</fieldset>
		
		<fieldset>
			<legend>Part III - 2 students who will attend the burial</legend>
			
			
			<div class="control-group">
			<div class="control-label">
			Student Number 1 Reg Number:
			</div>
			<div class="controls">
			<?php
						//autocomplete
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'model'=>$model,
					'attribute'=>'reg_number1',
					//'id'=>'prog_code',
					'source'=>$this->createUrl('//admission/student/fullSearch'),
					'options'=>array(
						'delay'=>300,
						'minLength'=>2,
						'showAnim'=>'fold',
						'select'=>"js:function(event, ui) {
						
							
						}"
					),
					'htmlOptions'=>array(
						'size'=>'40'
					),
				));
			?>
			</div>
		</div>
		
		
		<div class="control-group">
			<div class="control-label">
			Student Number 2 Reg Number:
			</div>
			<div class="controls">
			<?php
						//autocomplete
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'model'=>$model,
					'attribute'=>'reg_number2',
					//'id'=>'prog_code',
					'source'=>$this->createUrl('//admission/student/fullSearch'),
					'options'=>array(
						'delay'=>300,
						'minLength'=>2,
						'showAnim'=>'fold',
						'select'=>"js:function(event, ui) {
						
							
						}"
					),
					'htmlOptions'=>array(
						'size'=>'40'
					),
				));
			?>
			

				</div>
			</div>
		
		

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
