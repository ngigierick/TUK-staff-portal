

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'documentation-form',
	'type'=> 'vertical',
	'enableAjaxValidation' => false,
));
?>

<p class="note">
	<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
</p>
		

		<?php echo $form->errorSummary($model); ?>
		
		<?php echo $form->dropDownListRow($model, 'category_id', GxHtml::listDataEx(DocumentationCategory::model()->findAllAttributes(null, true))); ?>
		
		<?php echo $form->textFieldRow($model, 'title', array('maxlength' => 100)); ?>
		
		<div class="control-group">
		<div class="control-label required">
		<h3>Document text:</h3>
		</div>
		<div class="controls">
		<?php 
		
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'content', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>600,
            'height'=>600,
            'useCSS'=>true,
        ),
        'value'=>$model->content, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
		));
		?>
		</div>
		</div>
			
		
		
		<?php echo $form->dropDownListRow($model, 'status_id', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true))); ?>
		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'size'=>'large',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
