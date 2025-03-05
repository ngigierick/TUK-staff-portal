<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('pf_number')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->pfNumber)); ?>
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
	<?php echo GxHtml::encode($data->getAttributeLabel('relationship_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->relationship)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gender_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->gender)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('dob')); ?>:
	<?php echo GxHtml::encode($data->dob); ?>
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