
<?php
	

$this->renderPartial(				
	'form/pdf1',
	array(
		'student'=>$student,
		'user'=>$user,
		'date'=>$date,
		'feeitems'=>$feeitems,	
		'c'=>$c1,		
	));

$this->renderPartial(				
	'form/pdf1',
	array(
		'student'=>$student,
		'user'=>$user,
		'date'=>$date,
		'feeitems'=>$feeitems,	
		'c'=>$c2,		
	));
?>