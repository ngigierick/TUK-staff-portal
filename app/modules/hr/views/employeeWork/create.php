<h4><span class="icon-plus" >&nbsp;</span> &nbsp;&nbsp;Add Employment Information</h4>
<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'staff' => $staff,
		'buttons' => 'create'));
?>
</fieldset>