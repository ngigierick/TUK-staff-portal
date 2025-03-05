<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('reg_number')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->regNumber)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('relation_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->relation)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('affected_name')); ?>:
	<?php echo GxHtml::encode($data->affected_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('burial_date')); ?>:
	<?php echo GxHtml::encode($data->burial_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('burial_location')); ?>:
	<?php echo GxHtml::encode($data->burial_location); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('reg_number1')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->regNumber1)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('reg_number2')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->regNumber2)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('budget')); ?>:
	<?php echo GxHtml::encode($data->budget); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	*/ ?>

</div>