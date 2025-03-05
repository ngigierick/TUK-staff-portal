<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('aspirant_id')); ?>:
	<?php echo GxHtml::encode($data->aspirant_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('reg_number')); ?>:
	<?php echo GxHtml::encode($data->reg_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_number')); ?>:
	<?php echo GxHtml::encode($data->id_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('gender_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->gender)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('surname')); ?>:
	<?php echo GxHtml::encode($data->surname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('firstname')); ?>:
	<?php echo GxHtml::encode($data->firstname); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('othername')); ?>:
	<?php echo GxHtml::encode($data->othername); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('school_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->school)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('department_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->department)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('programme_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->programme)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('programme_end')); ?>:
	<?php echo GxHtml::encode($data->programme_end); ?>
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