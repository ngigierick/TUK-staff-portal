<fieldset>
<legend>
<h1>Update Bank Details for 
<?php echo GxHtml::valueEx($staff->title).' '.GxHtml::encode($staff->surname.' '.$staff->firstname.' '.$staff->othername.' ('.$staff->pf_number.')');?> 
</h1>
</legend>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>