<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('pf_number')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->pfNumber)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('level_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->level)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('institution')); ?>:
	<?php echo GxHtml::encode($data->institution); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('year')); ?>:
	<?php echo GxHtml::encode($data->year); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('award')); ?>:
	<?php echo GxHtml::encode($data->award); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	*/ ?>

</div>