<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('academicyear_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->academicyear)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('programme_code')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->programmeCode)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('surname')); ?>:
	<?php echo GxHtml::encode($data->surname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('firstname')); ?>:
	<?php echo GxHtml::encode($data->firstname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('othername')); ?>:
	<?php echo GxHtml::encode($data->othername); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('bank_account_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->bankAccount)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('bankslip')); ?>:
	<?php echo GxHtml::encode($data->bankslip); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('amount')); ?>:
	<?php echo GxHtml::encode($data->amount); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	*/ ?>

</div>