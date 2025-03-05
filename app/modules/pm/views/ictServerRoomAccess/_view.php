<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_accessed')); ?>:
	<?php echo GxHtml::encode($data->date_accessed); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('time_in')); ?>:
	<?php echo GxHtml::encode($data->time_in); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('time_out')); ?>:
	<?php echo GxHtml::encode($data->time_out); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('reason')); ?>:
	<?php echo GxHtml::encode($data->reason); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />

</div>