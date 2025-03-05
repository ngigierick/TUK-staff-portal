<legend>
<h1>Add Supervision Details on Postgraduate Student</h1>
</legend>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>