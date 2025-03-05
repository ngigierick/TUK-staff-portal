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
	<?php echo GxHtml::encode($data->getAttributeLabel('id_number')); ?>:
	<?php echo GxHtml::encode($data->id_number); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('pin_number')); ?>:
	<?php echo GxHtml::encode($data->pin_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nssf_number')); ?>:
	<?php echo GxHtml::encode($data->nssf_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nhif_number')); ?>:
	<?php echo GxHtml::encode($data->nhif_number); ?>
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
	<?php echo GxHtml::encode($data->getAttributeLabel('doe')); ?>:
	<?php echo GxHtml::encode($data->doe); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dot')); ?>:
	<?php echo GxHtml::encode($data->dot); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	*/ ?>

</div>