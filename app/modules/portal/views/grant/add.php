<?php $this->renderPartial("//site/common/notifications"); ?>
<h1><?php echo $model->isNewRecord ? 'ADD RESEARCH GRANT' : 'UPDATE RESEARCH GRANT';?></h1>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', 
	array('id' => 'claim-form',	
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'type'=> 'horizontal',	'enableAjaxValidation' => false,));
?>

<?php $model->staff_id=Yii::app()->user->id; echo $form->hiddenField($model, 'staff_id');?>
<?php $model->date_added=date('d/m/Y'); echo $form->hiddenField($model, 'date_added');?>
<?php echo $form->textAreaRow($model, 'title', array('maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'grant_amount', array('maxlength' => 100,'append'=>'just the figures without commas or currency')); ?>
<?php echo $form->textFieldRow($model, 'date_awarded', array('maxlength' => 20,'append'=>'in the format DD/MM/YYYY eg 01/01/2020')); ?>
<?php echo $form->textFieldRow($model, 'starting', array('maxlength' => 20,'append'=>'in the format MM/YYYY eg 01/2020')); ?>
<?php echo $form->textFieldRow($model, 'ending', array('maxlength' => 20,'append'=>'in the format MM/YYYY eg 12/2022')); ?>

<?php echo $form->dropDownListRow($model, 'school_id', GxHtml::listDataEx(School::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
<?php echo $form->dropDownListRow($model, 'faculty_id', GxHtml::listDataEx(Faculty::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
<?php echo $form->fileFieldRow($model, 'letter', array('maxlength' => 200)); ?>
<?php echo $form->fileFieldRow($model, 'proposal', array('maxlength' => 200)); ?>
<?php echo $form->fileFieldRow($model, 'nacosti_permit', array('maxlength' => 200)); ?>
<?php echo $form->fileFieldRow($model, 'indemnity_deed', array('maxlength' => 200)); ?>
<?php echo $form->fileFieldRow($model, 'ethics_approval', array('maxlength' => 200)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'size'=>'large',
		'label'=>$model->isNewRecord ? 'Submit' : 'Save Changes',
	)); ?>
	</div>
<?php $this->endWidget(); ?>
	

