<div class="well">
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'user-form',
	'type'=> 'horizontal',	
));
?>
<h1>Portal Sign In</h1>
<hr/>

<!-- Google Sign In-->
<div class="control-group hint">
<label class="control-label">
</label>
<a class="login" href="'.$authUrl.'"><img src="<?php echo $googleImage;?>" /></a>
<i>You can sign in with your official email using Google</i>
</div>
<br/>
<?php echo $form->textFieldRow($model, 'username', array('prepend'=>'<i class="icon-user"></i>','maxlength' => 255,'value'=>'')); ?>
<div class="control-group hint">
<label class="control-label">
</label>

<i>HINT: Use your registration number as username</i>

</div>

<br/>
<br/>
<?php echo $form->passwordFieldRow($model, 'password', array('prepend'=>'<i class="icon-lock"></i>','maxlength' => 255,'value'=>'')); ?>


<div class="control-group hint">
<label class="control-label">
</label>

<i>HINT:Use your ID/Passport number as password if you had never logged in and changed password. </i>

</div>
<div class="control-group hint">
<label class="control-label">
</label>

<i>Some ID numbers were captured as dot(".") . Use can try "." as password too. </i>

</div>
<hr/>
<div class="control-group hint">
<label class="control-label">
</label>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		//'icon'=>'forward',
		'size'=>'large',
		'label'=>'Log into the Portal',
	)); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<i>Unable to login?&nbsp;
<a href="help">Seek for assistance.</a>
</i>
</div>
<hr/>
<div class="control-group">
<label class="control-label">
</label>
<div class="controls">
<h3 class="intake">SATUK Bursary Application is now open!&nbsp;&nbsp;<span class="icon-pencil"></span>
<a href="/portal/bursary/apply">Apply now!
</a>
</h3>
</div>
</div>
<?php $this->endWidget(); ?>
</div>
