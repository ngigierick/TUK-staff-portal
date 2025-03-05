<div class="dashboard">
	 		<div class='span4'>
	<?php
		$this->beginWidget('bootstrap.widgets.TbBox',array(
			'title'=>'OPERATIONS PANEL',
			'headerIcon'=>'icon-th',
			
		));
		$this->widget('bootstrap.widgets.TbMenu', array(
			'type'=>'list',
			'items' => array(
						array('label'=>'PUBLIC PROFILE'),
						array('label'=>'Update public profile', 'icon'=>'edit', 'url'=>array('//portal/profile/view',)),
						array('label'=>'View own profile', 'icon'=>'globe', 'url'=>array('//portal/profile/fullProfile',)),
						array('label'=>'Who viewed your profile?', 'icon'=>'user', 'url'=>array('//portal/profile/analytics',)),
						array('label'=>'Download public profile', 'icon'=>'download-alt', 'url'=>array('//portal/profile/fullProfile','pdf'=>1)),
						array('label'=>'ONLINE SERVICES'),
						//array('label'=>'View PaySlip', 'icon'=>'briefcase','url'=>array('//portal/profile/payslip')),
						array('label'=>'ICT Support Request', 'icon'=>'book','url'=>array('//portal/ictServiceRequest/admin')),
						array('label'=>'Compliments/Complaints ', 'icon'=>'thumbs-up','url'=>array('//portal/ictServiceRequest/suggestion')),
						array('label'=>'Help', 'icon'=>'flag','url'=>array('//portal/profile/help')),
						'',
						array('label'=>'CONFIDENTIAL INFORMATION'),
						array('label'=>'View confidential Info',  'icon'=>'lock','url'=>array('//portal/profile/personalInfo',)),
						'',
						array('label'=>'QUICK REFERENCE'),
						array('label'=>'List of Professors', 'icon'=>'list', 'url'=>array('//portal/page/professors',)),
						array('label'=>'List of Doctors', 'icon'=>'list', 'url'=>array('//portal/page/doctors',)),
						array('label'=>'List of Publications', 'icon'=>'list', 'url'=>array('//portal/page/publications',)),
						array('label'=>'Course Units Taught', 'icon'=>'picture', 'url'=>array('//portal/page/courseUnitsTaught')),
						'',
						array('label'=>'Search for Staff',  'icon'=>'search','url'=>array('//portal/profile/home',)),
						array('label'=>'Academic Staff',  'icon'=>'briefcase','url'=>array('//portal/page/academicStaff',)),
						array('label'=>'Administration Staff ', 'icon'=>'tasks','url'=>array('//portal/page/administrationStaff')),
						'',
						array('label'=>'Most Viewed Profiles ', 'icon'=>'star-empty','url'=>array('//portal/page/mostViewedProfiles')),
						'',
						array('label'=>'Staff List ', 'icon'=>'user','url'=>array('//portal/profile/list')),							
						array('label'=>'Staff Official Email', 'icon'=>'envelope','url'=>'https://mail.tukenya.ac.ke/owa','linkOptions'=>array('target'=>'_blank'),),
						array('label'=>'Student Class Lists', 'icon'=>'list','url'=>'http://ar.tukenya.ac.ke/class-list/','linkOptions'=>array('target'=>'_blank'),),
						array('label'=>'Staff Official Documents', 'icon'=>'download-alt','url'=>'http://docs.tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
						'',
						array('label'=>'SECURITY SETTINGS'),
						array('label'=>'Change password', 'icon'=>'lock', 'url'=>array('//portal/profile/password',)),
						array('label'=>'Set security question', 'icon'=>'pencil', 'url'=>array('//portal/profile/securityQuestion',)),
						'',
						array('label'=>'LOGOUT'),
						array('label'=>'logout', 'icon'=>'eye-close', 'url'=>array('//site/logout',)),
																		
					)
				
		));
	$this->endWidget();?>		
	</div>
</div>