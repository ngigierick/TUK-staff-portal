<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('accountnumber')); ?>:
	<?php echo GxHtml::encode($data->accountnumber); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('branch')); ?>:
	<?php echo GxHtml::encode($data->branch); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('postaladdress')); ?>:
	<?php echo GxHtml::encode($data->postaladdress); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('telephone')); ?>:
	<?php echo GxHtml::encode($data->telephone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fax')); ?>:
	<?php echo GxHtml::encode($data->fax); ?>
	<br />

</div>