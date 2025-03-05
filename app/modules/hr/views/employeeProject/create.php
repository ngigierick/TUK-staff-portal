<fieldset>
<legend>
<h4><span class="icon-plus" >&nbsp;</span> &nbsp;&nbsp;Add Research Project</h4>
</legend>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>