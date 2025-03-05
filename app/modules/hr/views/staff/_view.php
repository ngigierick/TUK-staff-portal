<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('title_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->title)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('surname')); ?>:
	<?php echo GxHtml::encode($data->surname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('firstname')); ?>:
	<?php echo GxHtml::encode($data->firstname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('othername')); ?>:
	<?php echo GxHtml::encode($data->othername); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gender_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->gender)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('marital_status_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->maritalStatus)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('nationality_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->nationality)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('county_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->county)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_number')); ?>:
	<?php echo GxHtml::encode($data->id_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pin_number')); ?>:
	<?php echo GxHtml::encode($data->pin_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('designation')); ?>:
	<?php echo GxHtml::encode($data->designation); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dob')); ?>:
	<?php echo GxHtml::encode($data->dob); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pf_number')); ?>:
	<?php echo GxHtml::encode($data->pf_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('emp_terms_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->empTerms)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('grade_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->grade)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('doe')); ?>:
	<?php echo GxHtml::encode($data->doe); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dot')); ?>:
	<?php echo GxHtml::encode($data->dot); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('office_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->office)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('category_id')); ?>:
	<?php echo GxHtml::encode($data->category_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('postal_address')); ?>:
	<?php echo GxHtml::encode($data->postal_address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('postcode')); ?>:
	<?php echo GxHtml::encode($data->postcode); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('town')); ?>:
	<?php echo GxHtml::encode($data->town); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mobile')); ?>:
	<?php echo GxHtml::encode($data->mobile); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('photo')); ?>:
	<?php echo GxHtml::encode($data->photo); ?>
	<br />
	*/ ?>

</div>