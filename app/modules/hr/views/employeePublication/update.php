<fieldset>
<legend>
<h4><span class="icon-edit" >&nbsp;</span> &nbsp;&nbsp;Edit Publication</h4>
</legend>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>