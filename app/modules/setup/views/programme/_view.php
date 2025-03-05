<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('department_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->department)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('code')); ?>:
	<?php echo GxHtml::encode($data->code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->type)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('duration_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->duration)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('notes')); ?>:
	<?php echo GxHtml::encode($data->notes); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('requirements')); ?>:
	<?php echo GxHtml::encode($data->requirements); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status_id')); ?>:
	<?php echo GxHtml::encode($data->status_id); ?>
	<br />
	*/ ?>

</div>