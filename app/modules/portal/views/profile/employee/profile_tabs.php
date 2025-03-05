<?php $dashboard 		= StaffHelper::dashboard($model);?>
<?php $personal 		= StaffHelper::personalInfo($model);?>
<?php $contacts 		= StaffHelper::contactsDisplay($model);?>
<?php $qualifications 	= StaffHelper::qualificationsDisplay($model);?>
<?php $work 			= StaffHelper::work($model);?>
<?php $statement 		= StaffHelper::statement($model);?>
<?php $projects 		= StaffHelper::projects($model);?>
<?php $publications		= StaffHelper::publications($model);?>
<?php $supervision		= StaffHelper::supervision($model);?>
<?php $courses			= StaffHelper::courses($model);?>
<?php $professional		= StaffHelper::professional($model);?>
<?php $extras 			= StaffHelper::extras($model);?>
<?php $docs 			= StaffHelper::docs($model);?>

<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs',
    'placement'=>'top', 
    'tabs'=>array(
		array(
			'label'=>'Dashboard', 
			'content'=>$dashboard,
			'active'=>($page==1),
			'active'=>true,
		),
		array(
			'label'=>'Personal & Academic Info', 
			'content'=>$personal.$qualifications,
			//'active'=>($page==1),
		),
		array(
			'label'=>'Work Experience', 
			'content'=>$work,
			//'active'=>($page==4),
			
		),
		array(
			'label'=>'Research Statement & Projects', 
			'content'=>$statement.$projects,
			//'active'=>($page==5),
			
		),
		
		
		array(
			'label'=>'Publications', 
			'content'=>$publications,
			//'active'=>($page==7),
			
		),
		
		array(
			'label'=>'Students Supervision', 
			'content'=>$supervision,
			//'active'=>($page==8),
			
		),
		
		array(
			'label'=>'Courses Taught', 
			'content'=>$courses,
			//'active'=>($page==9),
			
		),
		
		array(
			'label'=>'Professional Qualifications', 
			'content'=>$professional,
			//'active'=>($page==10),
			
		),
		array(
			'label'=>'Any other Information', 
			'content'=>$extras,
			//'active'=>($page==11),
			
		),
		
		array(
			'label'=>'Document Uploads', 
			'content'=>$docs,
			//'active'=>($page==12),
			
		),
		
     ),  
)); 		
?>