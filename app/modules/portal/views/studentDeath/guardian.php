

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'student-death-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

<h1>Report Death of Your Guardian (Father, Mother, Uncle, ...)</h1>
<hr/>
<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
		),
	)
); 

?>
	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
		
		<?php $model->reg_number= $student->reg_number;?>
		<?php $model->reporter_id=Yii::app()->user->id;//self?>
		<?php $model->status = $model->isNewRecord ? 0 : $model->status;?>
		<?php $model->budget = $model->isNewRecord ? 0 : $model->budget;?>
		<?php echo $form->hiddenField($model, 'reg_number'); ?>
		<?php echo $form->hiddenField($model, 'reporter_id'); ?>
		<?php echo $form->hiddenField($model, 'status'); ?>
		<?php echo $form->hiddenField($model, 'budget'); ?>
		<fieldset>
		<legend>Part I - Details of the Diseased</legend>
		
		
		<?php echo $form->textFieldRow($model, 'affected_name', array('maxlength' => 30)); ?>
		
		
		
		<?php echo $form->dropDownListRow($model, 'relation_id', GxHtml::listDataEx(Relationship::model()->findAll('id<3')),array('prompt'=>'Select one')); ?>
		
		
		</fieldset>
		
		<fieldset>
			<legend>Part II - Funeral/ Burial Information</legend>
		
		
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
		'type'=>'success',
		'icon'=>'ok',
		'label'=>$model->isNewRecord ? 'Submit' : 'Save Changes',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
