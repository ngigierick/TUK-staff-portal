<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('pf_number')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->pfNumber)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('bank_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->bank)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('account_number')); ?>:
	<?php echo GxHtml::encode($data->account_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('branch')); ?>:
	<?php echo GxHtml::encode($data->branch); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />

</div>