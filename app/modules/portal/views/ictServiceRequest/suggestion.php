
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'ict-service-request-form',
	'type'=> 'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));
?>

<h1><span class="icon-thumbs-up">&nbsp;</span>&nbsp;Compliment/ Complaint to the Directorate of ICT Services</h1><hr />
<span class="note">We value your feedback! Feel free to submit your comment on the services offered by the Directorate of ICT Services.</span>

<br />	
<br />
		<?php echo $form->errorSummary($model); ?>

<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			 'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			  'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>
	<div class="control-group">
		<div class="control-label required">
		Type<span class="required">*</span>
		</div>
		<div class="controls">
		<?php 
			$type = array(0=>'Select one',1=>'Compliment',2=>'Complaint');
			echo CHtml::dropDownList('type_id','',$type); ?>
		</div>
	</div>
	<?php if(!isset(Yii::app()->user->id)):?>
	<?php echo $form->textFieldRow($model, 'name', array('append'=>'<span>Your Name or any form of identification</span>','maxlength' => 100)); ?>
	<?php endif;?>
	<?php echo $form->textAreaRow($model,'contact',array('rows'=>5, 'cols'=>1000)); ?>
	<?php echo $form->textAreaRow($model,'description',array('rows'=>10, 'cols'=>1000)); ?>
	
	<div class="control-group">
		<div class="control-label required">
		Answer if human:<span class="required">*</span>
		</div>
		<div class="controls">
		<?php echo $capture.$form->textField($model, 'verifyCode'); ?>
		<?php echo $form->error($model,'verifyCode'); ?>
		</div>
	</div>
		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'icon'=>'ok',
		'label'=>'Submit',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>
