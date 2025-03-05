<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=> 'vertical',
	//'action'=>Yii::app()->createUrl('//user/studentMail/sendReply'),
	
));
?>



<?php echo $form->errorSummary($model); ?>


<fieldset>
	
		<legend>Reply Message about <?php echo $mail->subject;?></legend>

		<?php echo $form->hiddenField($model,'subject',array('size'=>30, 'value'=>$mail->subject)); ?>
		<?php echo $form->hiddenField($model,'student_id',array('size'=>30, 'value'=>$mail->student_id)); ?>
		<?php echo $form->hiddenField($model,'support_id',array('size'=>30, 'value'=>$mail->support_id)); ?>
		<?php echo $form->hiddenField($model,'sender',array('size'=>30, 'value'=>1)); ?>
		<?php echo $form->hiddenField($model,'status_id',array('size'=>30, 'value'=>0)); ?>
		<?php echo $form->hiddenField($model,'date_modified',array('size'=>30, 'value'=>time())); ?>
		<?php echo $form->hiddenField($model,'date_created',array('size'=>30, 'value'=>$mail->date_modified)); ?>
		<?php echo $form->hiddenField($model,'reply_date',array('size'=>30, 'value'=>time())); ?>
		<?php echo $form->hiddenField($model,'parent_id',array('size'=>30, 'value'=>$mail->id)); ?>
		<div class="control-group">
		<div class="control-label required">
		
		</div>
		<div class="controls">
		<?php 
		
		$this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'body', 
        'options'=>array(
            'width'=>600,
            'height'=>250,
            'useCSS'=>true,
        ),
        'value'=>$model->body, 
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
		'label'=>'Send',
		'icon'=>'ok',
	)); ?>
	
</div>
<?php	
$this->endWidget();
?>