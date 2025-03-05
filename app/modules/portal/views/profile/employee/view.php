<?php $this->renderPartial("//site/common/notifications"); ?>
<?php $this->renderPartial('employee/header', array('model'=>$model));?>
<?php $this->renderPartial('employee/profile_tabs', array('model'=>$model,'page'=>$page));?>
<?php $this->renderPartial('employee/load_form', array('model'=>$model));?>

