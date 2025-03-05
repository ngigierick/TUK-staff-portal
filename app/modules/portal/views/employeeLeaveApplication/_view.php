<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('leave_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->leave)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('staff_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->staff)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('start_date')); ?>:
	<?php echo GxHtml::encode($data->start_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('end_date')); ?>:
	<?php echo GxHtml::encode($data->end_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total_days')); ?>:
	<?php echo GxHtml::encode($data->total_days); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('taken_days')); ?>:
	<?php echo GxHtml::encode($data->taken_days); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('rem_days')); ?>:
	<?php echo GxHtml::encode($data->rem_days); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('is_latest')); ?>:
	<?php echo GxHtml::encode($data->is_latest); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	*/ ?>

</div>