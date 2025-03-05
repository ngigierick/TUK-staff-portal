<div class='span4'>
	<div id="sidebar">
	<?php
		
		$this->widget('bootstrap.widgets.TbMenu', array(
			'type'=>'list',
			'items' => array(
						array('label'=>'Quick Links'),
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
						//array('label'=>'Search for Staff ', 'icon'=>'search','url'=>array('//portal/profile/home')),
						'',
						array('label'=>'TU-K Main Website', 'icon'=>'globe','url'=>'http://tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
						array('label'=>'TU-K Library Website', 'icon'=>'book','url'=>'http://library.tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
						array('label'=>'Staff List ', 'icon'=>'user','url'=>array('//portal/profile/list')),							
						array('label'=>'ICT Support Request', 'icon'=>'book','url'=>array('//portal/ictServiceRequest/admin')),
						array('label'=>'Staff Official Email', 'icon'=>'envelope','url'=>'https://mail.tukenya.ac.ke/owa','linkOptions'=>array('target'=>'_blank'),),
						array('label'=>'Student Class Lists', 'icon'=>'list','url'=>'http://ar.tukenya.ac.ke/class-list/','linkOptions'=>array('target'=>'_blank'),),
						array('label'=>'Staff Official Documents', 'icon'=>'download-alt','url'=>'http://docs.tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
						array('label'=>'Compliments/Complaints ', 'icon'=>'thumbs-up','url'=>array('//portal/ictServiceRequest/suggestion')),
						array('label'=>'Help', 'icon'=>'flag','url'=>array('//portal/profile/help')),
																		
					)
				
		));
	?>
	</div>	
</div>
