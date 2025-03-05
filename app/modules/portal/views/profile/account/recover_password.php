<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'user-form',
	'type'=> 'horizontal',	
));?>

<div class="well">
<h1>Recover Password</h1>
<hr />
<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
	   ),
	)
); 

?>
<fieldset>
<?php if ((empty($user->securityQuestion->question))&&(empty($data['question']))):?>
<?php echo $form->textFieldRow($model, 'username', array('prepend'=>'<i class="icon-user"></i>','maxlength' => 255,'value'=>'','autocomplete'=>"off")); ?>
<div class="control-group hint">
<label class="control-label">
</label>

<i>HINT: Use your PF number as username</i>

</div>
<?php else:?>
	<?php if (isset($user->securityQuestion->question)):?>
	<p><b><?php echo $user->securityQuestion->question;?></b></p>
	<div class="control-group">
			<label class="control-label">
				
			</label>
		<div class="controls">
			<?php echo $form->passwordField($model, 'security_answer', array('prepend'=>'<i class="icon-lock"></i>','maxlength' => 255,'value'=>'','autocomplete'=>"off")); ?>
		</div>
	</div>
	<?php echo CHtml::hiddenField('answer',1); ?>
	<?php echo $form->hiddenField($model, 'username'); ?>
	<?php else:?>
		<p><b><?php echo $data['question'];?></b></p>
	<div class="control-group">
			<label class="control-label">	
			</label>
		<div class="controls">
			<?php if ($data['index']==0):?>
			<?php echo $form->passwordField($model, 'security_answer', array('prepend'=>'<i class="icon-lock"></i>','maxlength' => 255,'value'=>'','autocomplete'=>"off")); ?>
			<?php else:?>
				<?php
					$y = date('Y');
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'name'=>'LoginForm[security_answer]',
					'options'=>array(
						'showAnim'=>'fold',
						'changeMonth'=>true,
						'changeYear'=>true,
						'yearRange'=>'1930:'.$y,
						'dateFormat'=>'dd/mm/yy',
					),
					'htmlOptions'=>array(
						'style'=>'height:20px;'
						),
					));?>
			<?php endif;?>
		</div>
	</div>
	<?php echo CHtml::hiddenField('index',$data['index']); ?>
	<?php echo $form->hiddenField($model, 'username',''); ?>
	<?php endif;?>
<?php endif;?>
<br /><br />

<div class="control-group hint">
<label class="control-label">
</label>
<div class="controls">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'warning',
		'size'=>'medium',
		'icon'=>'lock',
		'label'=>'Proceed',
	)); ?>
<hr />
Other links&nbsp;<span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
<?php echo CHtml::link( '<span class="icon-lock"> </span> &nbsp;&nbsp;Sign In', array('//site/login'));?> 
<i>&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;&nbsp;</i>
<?php echo CHtml::link( '<span class="icon-flag"> </span> &nbsp;&nbsp;Help', array('//portal/profile/help'));?>

<br />
</div>
</fieldset>
<?php $this->endWidget(); ?>
</div>
