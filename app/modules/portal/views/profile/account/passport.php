<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 
?>
<h1>UPLOAD NEW PROFILE PHOTO</h1>
	
<?php echo $form->errorSummary($model); ?>
<?php $this->renderPartial("//site/common/notifications"); ?>

<table class="table table-condensed table-bordered">
<tr>
	<td>
	PHOTO REQUIREMENTS:
	</td>
	<td>
		<h4 class="warning">SIZE:  About 72px(width) by 80px(height)  or 1.9cm(width) by 2.1cm(height)</h4>
		<h4 class="warning">BACKGROUND: WHITE </h4>
		<h4 class="warning">FILE TYPE: .JPG</h4>
	</td>
</tr>
<tr>
	<td>
	CURRENT PHOTO:
	</td>
	<td>
		<?php echo StaffHelper::pic($model);?>
	</td>
</tr>
<tr>
	<td>
	NEW PHOTO:
	</td>
	<td>
	<?php echo $form->fileField($model, 'profile_link', array('maxlength' => 30)); ?>
	</td>
</tr>
</table>
		
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
				'type'=>'warning',
				'size'=>'medium',
				//'icon'=>'forward',
				'label'=>'Cancel Upload',
				 'url'=>array('//portal/profile/view'),
	)); ?>
		
	OR
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'medium',
		//'icon'=>'ok',
		'label'=>'Save New Passport Photo',
	)); ?>
	</div>
		

<?php
$this->endWidget();
?>
