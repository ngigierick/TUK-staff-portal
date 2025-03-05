<fieldset>
<legend>
<h1>Add Course Unit You are Teaching</h1>
</legend>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>