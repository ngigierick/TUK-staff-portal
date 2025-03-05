<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('position')); ?>:
	<?php echo GxHtml::encode($data->position); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pf_number')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->pfNumber)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('institution')); ?>:
	<?php echo GxHtml::encode($data->institution); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('starting_date')); ?>:
	<?php echo GxHtml::encode($data->starting_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ending_date')); ?>:
	<?php echo GxHtml::encode($data->ending_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	*/ ?>

</div>