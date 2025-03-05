<fieldset>
<h4><span class="icon-edit" >&nbsp;</span> &nbsp;&nbsp;Update Contact and Designation Information</h4>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>