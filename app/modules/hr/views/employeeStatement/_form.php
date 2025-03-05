

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-statement-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
		<div class="control-group">
		<div class="control-label required">
		General Statement on Research Area
		</div>
		<div class="controls">
		<?php 
		
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'statement', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>600,
            'height'=>250,
            'useCSS'=>true,
        ),
        'value'=>$model->statement, //If you want pass a value for the widget. I think you will. Se voc� precisar passar um valor para o gadget. Eu acho ir�.
		));
		?>
		</div>
		</div>
		
		
		
		
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