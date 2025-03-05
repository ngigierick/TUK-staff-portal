<h2>Kindly Take Part in the<a href="https://forms.gle/ipX1esUihaKQMmWo9"> TU-K Staff Survey on ODeL e-READINESS</a></h2>
<h3>Enquiries on official staff email should be sent to: 
	<a href="mailto:ictsupport@tukenya.ac.ke">ictsupport@tukenya.ac.ke</a> quoting your payroll number
</h3>
<?php if(!empty(Yii::app()->user->id)):?>
	<?php $this->renderPartial('account/profile');?>
<?php else:?>
	<?php $this->renderPartial('account/search_staff');?>
	<?php $this->renderPartial('account/login');?>
	<?php echo Yii::app()->utility->downloads();?>
	<?php echo Yii::app()->linkManager->homeLinks();?>
<?php endif;?>


	
	
				
			
		


