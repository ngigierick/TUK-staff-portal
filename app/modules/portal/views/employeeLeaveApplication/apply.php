<h1>Leave Applications</h1>
<?php $this->renderPartial("//site/common/notifications"); ?>
<?php if (!empty($others)):?>
	<?php 
	$this->widget('CTabView', array(
		'tabs'=>array(
			'tab1'=>array(
				'title'=>'<span>Apply for Leave</span>',
				'view'=>'_apply',
				'data'=>array('leaves'=>$leaves),
			),
			'tab2'=>array(
				'title'=>'<span>Leave Applications</span>',
				'view'=>'_applications',
				'data'=>array('model'=>$model,'applications'=>$applications),
			),
			
		),
	)); ?>
<?php elseif (count($applications)>0):?>
	<?php 
	$this->widget('CTabView', array(
		'tabs'=>array(
			'tab1'=>array(
				'title'=>'<span>Leave Applications</span>',
				'view'=>'_applications',
				'data'=>array('model'=>$model,'applications'=>$applications),
			),
			'tab2'=>array(
				'title'=>'<span>Apply for Leave</span>',
				'view'=>'_apply',
				'data'=>array('leaves'=>$leaves),
			),
			
		),
	)); ?>
	<?php else:?>
	<?php 
	$this->widget('CTabView', array(
		'tabs'=>array(
			'tab1'=>array(
				'title'=>'<span>Apply for Leave</span>',
				'view'=>'_apply',
				'data'=>array('leaves'=>$leaves),
			),
		),
	)); ?>
<?php endif;?>