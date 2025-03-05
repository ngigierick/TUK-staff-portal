<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('programme_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->programme)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('code')); ?>:
	<?php echo GxHtml::encode($data->code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('module_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->module)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('start_year')); ?>:
	<?php echo GxHtml::encode($data->start_year); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('start_term')); ?>:
	<?php echo GxHtml::encode($data->start_term); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('duration')); ?>:
	<?php echo GxHtml::encode($data->duration); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('no_of_terms')); ?>:
	<?php echo GxHtml::encode($data->no_of_terms); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pattern')); ?>:
	<?php echo GxHtml::encode($data->pattern); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status_id')); ?>:
	<?php echo GxHtml::encode($data->status_id); ?>
	<br />
	*/ ?>

</div>