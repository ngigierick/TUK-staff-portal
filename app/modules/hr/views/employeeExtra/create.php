<fieldset>
<legend>
<h1>Add Any Extra Information </h1>
</legend>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>