<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('pf_number')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->pfNumber)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('home')); ?>:
	<?php echo GxHtml::encode($data->home); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nationality_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->nationality)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('county_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->county)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('postal_address')); ?>:
	<?php echo GxHtml::encode($data->postal_address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('postal_code')); ?>:
	<?php echo GxHtml::encode($data->postal_code); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('town')); ?>:
	<?php echo GxHtml::encode($data->town); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('office_telephone')); ?>:
	<?php echo GxHtml::encode($data->office_telephone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mobile')); ?>:
	<?php echo GxHtml::encode($data->mobile); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	*/ ?>

</div>