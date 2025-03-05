<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'role-form',
	'type'=> 'vertical',
	//'enableAjaxValidation' => true,
));
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
		
	<?php echo $form->errorSummary($model); ?>

<fieldset>
		
		
		<div class="control-group">
		<div class="control-label required">
		<h3>Subject:</h3>
		</div>
		<div class="controls">
		<?php echo $form->textField($model,'subject',array('size'=>100,'maxlength'=>1000)); ?>
		</div>
		</div>
		
		<div class="control-group">
		<div class="control-label required">
		<h3>Mesage:</h3>
		</div>
		<div class="controls">
		<?php 
		
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'body', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>600,
            'height'=>250,
            'useCSS'=>true,
        ),
        'value'=>$model->body, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
		));
		?>
		</div>
		</div>
		
		
</fieldset>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'size'=>'large',
		'icon'=>'ok',
		'label'=>'Send Mail',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'size'=>'large','label'=>'Reset Mail Details')); ?>
</div>
<?php	
$this->endWidget();
?>

