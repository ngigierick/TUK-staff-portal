<div class='span3'>
	<div id="sidebar">
	
	<?php
	
		$this->widget('bootstrap.widgets.TbMenu', array(
			'type'=>'list',
			'items' => array(
						array('label'=>'Quick Links'),
						array('label'=>'List of Professors',  'url'=>array('//portal/page/professors',)),
						array('label'=>'List of Doctors',  'url'=>array('//portal/page/doctors',)),
						array('label'=>'List of Publications',  'url'=>array('//portal/page/publications',)),
						array('label'=>'Course Units Taught',  'url'=>array('//portal/page/courseUnitsTaught')),
						
						array('label'=>'Search for Staff', 'url'=>array('//portal/profile/home',)),
						array('label'=>'Academic Staff',  'url'=>array('//portal/page/academicStaff',)),
						array('label'=>'Administration Staff ', 'url'=>array('//portal/page/administrationStaff')),
						
						array('label'=>'Most Viewed Profiles ', 'url'=>array('//portal/page/mostViewedProfiles')),
					
						array('label'=>'TU-K Main Website', 'url'=>'http://tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
						array('label'=>'TU-K Library Website', 'url'=>'http://library.tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
						
																		
					)
				
		));
		?>	
	</div>
</div>
