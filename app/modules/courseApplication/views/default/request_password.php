
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
<h1>Recover Fogotten Password</h1>
<div class="notes">
This is a password recovery page. A new password will be generated and sent to your email address. You will be required to retrieve the new password and login with.
</div>
<div class="well">
<br />
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'user-form',
	'type'=> 'horizontal',	
));
?>
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
<label class="control-label">
Email
</label>
<div class="controls">
<?php echo $form->textField($model, 'username', array('prepend'=>'<i class="icon-user"></i>','maxlength' => 255,'value'=>'')); ?>
</div>
</div>
<br />

<div class="control-group hint">
<label class="control-label">
</label>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		//'icon'=>'forward',
		'size'=>'medium',
		'label'=>'Recover Password',
	)); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;

<i>
<?php echo  CHtml::link('Sign In', array('//courseApplication/default/login'));?>
</i>
</div>


</div>
</div>

<?php $this->endWidget(); ?>
