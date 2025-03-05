<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><br/><?php //echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('post/index')),
				array('label'=>'About', 'url'=>array('site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('site/contact')),
				array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); */
		
	$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>'POLYMIS',
    'brandUrl'=>'#',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('post/index'), 'active'=>true),
                array('label'=>'Application', 'url'=>array('site/page', 'view'=>'about')),
				array('label'=>'Selection', 'url'=>array('site/page', 'view'=>'about')),
				array('label'=>'Admission', 'url'=>array('site/page', 'view'=>'about')),
				array('label'=>'Students', 'url'=>array('site/page', 'view'=>'about')),
				array('label'=>'Reports', 'url'=>array('site/page', 'view'=>'about')),
            ),
        ),
        //'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'zii.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
               
				 array('label'=>'Setup & Administration','icon'=>'cog', 'url'=>'#', 'items'=>array(
					array('label'=>'UNIVERSITY SETUP'),
                    array('label'=>'Manage University', 'url'=>array('/setup/institution/admin'),),
					//array('label'=>'View University Details', 'url'=>array('/setup/institution/view/id/1'),),
					//array('label'=>'Update University Details', 'url'=>array('/setup/institution/update/id/1'),),
                   '---',
                    array('label'=>'FACULTIES, SCHOOLS'),
                    array('label'=>'Manage Faculties', 'url'=>array('/setup/faculty/admin'),),
					array('label'=>'Manage Schools', 'url'=>array('/setup/school/admin'),),
					array('label'=>'Manage Departments', 'url'=>array('/setup/department/admin'),),
					array('label'=>'Manage Courses', 'url'=>array('/setup/programme/admin'),),
					array('label'=>'ACADEMIC YEAR'),
					array('label'=>'Manage Academic Year Calendar', 'url'=>'#'),
					array('label'=>'Manage Semesters/ Terms', 'url'=>'#'),
					array('label'=>'Manage Programme Classes', 'url'=>array('/setup/programmeClass/admin'),),
					array('label'=>'STUDENT FEES'),
					array('label'=>'Manage Statutory Fees', 'url'=>'#'),
					array('label'=>'Manage Programme Fees', 'url'=>'#'),
					array('label'=>'SYSTEM USERS'),
					array('label'=>'Manage Users', 'url'=>'#'),
					array('label'=>'Manage User Groups', 'url'=>'#'),
					

					
                )),
				array('label'=>'Profile', 'icon'=>'user', 'url'=>'#'),
				array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
            ),
        ),
    ),
	)); ?>
		
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div style="clear:both"></div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> The Kenya Polytechnic University College.<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>