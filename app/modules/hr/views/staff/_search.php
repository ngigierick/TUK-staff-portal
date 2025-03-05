
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->dropDownList($model, 'title_id', GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'surname', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'firstname', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'othername', array('maxlength' => 30)); ?>

	
	<?php echo $form->dropDownList($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'marital_status_id', GxHtml::listDataEx(Maritalstatus::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'nationality_id', GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'county_id', GxHtml::listDataEx(County::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'id_number', array('maxlength' => 20)); ?>

	
	<?php echo $form->textField($model, 'pin_number', array('maxlength' => 20)); ?>

	
	<?php echo $form->textField($model, 'designation', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'dob', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'pf_number', array('maxlength' => 20)); ?>

	
	<?php echo $form->dropDownList($model, 'emp_terms_id', GxHtml::listDataEx(EmpTerms::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'grade_id', GxHtml::listDataEx(Grade::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'doe', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'dot', array('maxlength' => 30)); ?>

	
	<?php echo $form->dropDownList($model, 'office_id', GxHtml::listDataEx(Office::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'category_id'); ?>

	
	<?php echo $form->textField($model, 'postal_address', array('maxlength' => 200)); ?>

	
	<?php echo $form->textField($model, 'postcode', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'town', array('maxlength' => 20)); ?>

	
	<?php echo $form->textField($model, 'mobile', array('maxlength' => 60)); ?>

	
	<?php echo $form->textField($model, 'email', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'status'); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'photo', array('maxlength' => 100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>

