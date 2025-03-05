<div  class="span3">
		<?php if(!isset(Yii::app()->user->id)):?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'size'=>'medium',
			'icon'=>'lock',
			'label'=>'Sign In Now',
			 'url'=>array('//site/login'),
			 )); ?>
		<div class='signin'>
		By signing in, you will be able to access more staff services like downloading pay slip, applying for leave, updating your profile, uploading publications, viewing and confirming confidential information as captured by Human Resource Office, among others.
		<br/><br/>
		<p>Don't know what to do? <a href="index.php?r=portal/profile/help">Get help here.</a></p>
		</div>		
	    <?php else:?>
			 <?php $id = Yii::app()->user->id;
			$model = $this->loadModel($id, 'Employee');?>
				<?php echo StaffHelper::pic($model);?><br/>
				<h2>Welcome, <?php echo $model->names();?>!</h2>
				<div class='signin'>
				You can access more services like downloading pay slip, applying for leave, updating your profile, viewing and confirming confidential information as captured by Human Resource Office, among others. Click the button below to proceed.
				</div><br/>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
				'type'=>'success',
				'size'=>'medium',
				'icon'=>'forward',
				'label'=>'Proceed to Profile',
				 'url'=>array('//portal/profile/view'),
				 )); ?>
		<?php endif;?>
</div>