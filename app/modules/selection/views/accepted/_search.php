<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_id'); ?>
		<?php echo $form->dropDownList($model, 'title_id', GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'reg_number'); ?>
		<?php echo $form->textField($model, 'reg_number', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_number'); ?>
		<?php echo $form->textField($model, 'id_number', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'surname'); ?>
		<?php echo $form->textField($model, 'surname', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'firstname'); ?>
		<?php echo $form->textField($model, 'firstname', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'othername'); ?>
		<?php echo $form->textField($model, 'othername', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'programme_id'); ?>
		<?php echo $form->dropDownList($model, 'programme_id', GxHtml::listDataEx(Programme::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'academicyear_id'); ?>
		<?php echo $form->dropDownList($model, 'academicyear_id', GxHtml::listDataEx(AcademicYear::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'dob'); ?>
		<?php echo $form->textField($model, 'dob', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'gender_id'); ?>
		<?php echo $form->dropDownList($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'marital_status_id'); ?>
		<?php echo $form->dropDownList($model, 'marital_status_id', GxHtml::listDataEx(MaritalStatus::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nationality_id'); ?>
		<?php echo $form->dropDownList($model, 'nationality_id', GxHtml::listDataEx(Nationality::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'county_id'); ?>
		<?php echo $form->dropDownList($model, 'county_id', GxHtml::listDataEx(County::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ethnicity_id'); ?>
		<?php echo $form->dropDownList($model, 'ethnicity_id', GxHtml::listDataEx(Ethnicity::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'religion_id'); ?>
		<?php echo $form->dropDownList($model, 'religion_id', GxHtml::listDataEx(Religion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'postal_address'); ?>
		<?php echo $form->textField($model, 'postal_address', array('maxlength' => 200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'postcode'); ?>
		<?php echo $form->textField($model, 'postcode', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'town'); ?>
		<?php echo $form->textField($model, 'town', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'mobile'); ?>
		<?php echo $form->textField($model, 'mobile', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'disability_id'); ?>
		<?php echo $form->dropDownList($model, 'disability_id', GxHtml::listDataEx(Answer::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'occupation'); ?>
		<?php echo $form->textField($model, 'occupation', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employer'); ?>
		<?php echo $form->textField($model, 'employer', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employer_address'); ?>
		<?php echo $form->textField($model, 'employer_address', array('maxlength' => 200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employer_telephone'); ?>
		<?php echo $form->textField($model, 'employer_telephone', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'employer_otherinfo'); ?>
		<?php echo $form->textField($model, 'employer_otherinfo', array('maxlength' => 200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'extra_info'); ?>
		<?php echo $form->textField($model, 'extra_info', array('maxlength' => 200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status'); ?>
		<?php echo $form->textField($model, 'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_modified'); ?>
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'photo'); ?>
		<?php echo $form->textField($model, 'photo', array('maxlength' => 100)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
