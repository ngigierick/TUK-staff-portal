<?php $model = $this->loadModel(Yii::app()->user->id, 'Employee');?>
<div  class="row split">
	<div  class="span3">
		<?php echo StaffHelper::pic($model);?>
		<?php echo CHtml::link('<span id="add_new_item" class="icon-upload" ></span> Replace profile photo ', array('//portal/profile/photo'));?>
	</div>
	<div  class="span8">
				<h1><?php echo $model->fullName(); ?></h1>
				<?php echo StaffHelper::employmentAndEducationStatus($model);?>
	</div>
</div>
<?php $contact = EmployeeContact::model()->find("pf_number='".$model->pf_number."'");?>
<?php if (isset($contact)&&($contact->updated!=1)):?>
	<?php $this->renderPartial('account/update_contacts',array('model'=>$contact));?>
<?php else:?>
	<?php $this->renderPartial('account/contact_view',array('contact'=>$contact));?>
	<h3>
		You can access more services like downloading pay slip, applying for leave, updating your profile, viewing and confirming confidential information as captured by Human Resource Office, among others. Click the button below to proceed.
		</h3><br/>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'info',
		'size'=>'large',
		//'icon'=>'forward',
		'label'=>'Proceed',
		 'url'=>array('//portal/profile/view'),
		 )); ?>
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'size'=>'large',
		//'icon'=>'forward',
		'label'=>'Logout',
		 'url'=>array('//site/logout'),
		 )); ?>
	</div
<?php endif;?>