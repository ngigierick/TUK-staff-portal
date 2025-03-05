<div  class="row split">
	<div  class="span3">
		<?php echo StaffHelper::pic($model);?>
		<?php echo CHtml::link('<span id="add_new_item" class="icon-upload" ></span>Replace profile photo ', array('//portal/profile/photo'));?>
	</div>
	<div  class="span8">
				<h1><?php echo $model->fullName(); ?></h1>
				<?php echo StaffHelper::employmentAndEducationStatus($model);?>
	</div>
</div>
