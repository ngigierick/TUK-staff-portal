<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'activity-form',
'enableAjaxValidation'=>false,
'type'=>'vertical',   )); ?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>
	
	<fieldset>
	<legend>Project Activity Details</legend>
	
	<div class="notes">
	A Project Actitvity is an event in the project execution. It represents a project phase in the development of this system. 
	An activity outlines what kinds of tasks that have been performed or achieved in the life-cycle of the system.
	</div>

		<?php echo $form->errorSummary($model); ?>
		
		
		<?php 
			echo $form->datepickerRow($model, 'date_added',
            array('prepend'=>'<i class="icon-calendar"></i>' 
                    , 'options'=>array( 'format' => 'dd/mm/yyyy', 
                                        'weekStart'=> 1,
                                        'showButtonPanel' => true,
                                        'showAnim'=>'fold',)
            )
        );

		?>
		<div class="control-group">
		<div class="control-label required">
		Description:
		</div>
		<div class="controls">
		<?php 
		
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'content', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>600,
            'height'=>250,
            'useCSS'=>true,
        ),
        'value'=>$model->content, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
		));
		?>
		</div>
		</div>	
		
		
		<?php echo $form->dropDownListRow($model, 'status_id', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true))); ?>
		
	</fieldset>	

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
