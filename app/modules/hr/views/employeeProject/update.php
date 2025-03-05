<fieldset>
<legend>
<h4><span class="icon-edit" >&nbsp;</span> &nbsp;&nbsp;Update Research Project</h4>
</legend>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>