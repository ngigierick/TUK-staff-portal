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
<h1>Sign In as Applicant</h1>
<div class="well">
<br />
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'user-form',
	'type'=> 'horizontal',	
));
?>
<div class="control-group">
<label class="control-label">
Email <span class="required">*</span>
</label>
<div class="controls">
<?php echo $form->textField($model, 'username', array('prepend'=>'<i class="icon-user"></i>','maxlength' => 255,'value'=>'')); ?>
</div>
</div>

<br/>

<?php echo $form->passwordFieldRow($model, 'password', array('maxlength' => 255,'value'=>'')); ?>


<br />

<div class="control-group hint">
<label class="control-label">
</label>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'icon'=>'forward',
		'size'=>'medium',
		'label'=>'Sign In',
	)); ?>


</div>
<hr />
<div class="control-group hint">
<label class="control-label">
</label>
<i class="icon-lock"> </i> &nbsp;&nbsp;Forgot password?&nbsp;
<?php echo  CHtml::link('Request password', array('//courseApplication/default/requestPassword'));?>
</div>
<br />
<div class="control-group hint">
<label class="control-label">
</label>
<i class="icon-user"> </i> &nbsp;&nbsp;Don't have account?&nbsp;
<?php echo  CHtml::link('Sign up ', array('//courseApplication/default'));?>
</div>
<hr />
</div>

<?php $this->endWidget(); ?>
