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
	<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl;?>/images/favicon.ico" mce_href="<?php echo Yii::app()->baseUrl;?>/images/favicon.ico"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<div id="header">
		<div id="logo"><br/><?php //echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
	<?php 
	//LEGEND/////////
	//	1- Administrator
	//	2-Finance
	//	3-Admission
	//////////////
	
	$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>'<span id="brand">TuSOFT Management System</span>',
    'brandUrl'=>array('/site'),
    'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
			'htmlOptions'=>array('class'=>'pull-left'),
            'items'=>array(
				
				//login
				array('label'=>'Login', 			'url'=>array('/site/login'), 	'visible'=>Yii::app()->user->isGuest),
				
				//application
				array('label'=>'Application', 		
						'url'=>'#',
						//'icon'=>'pencil',						
						'visible'=>Yii::app()->user->checkAccess(3),
						'items'=>array(
							array('label'=>'Enrol new applicant', 'url'=>array('/intake/applicant/enroll',)),
							array('label'=>'Manage applicants', 'url'=>array('/intake/applicant/admin'))
						),
				),
				
				//selection
				array('label'=>'Selection', 		
						'url'=>'#',		
						//'icon'=>'thumbs-up',
						'visible'=>Yii::app()->user->checkAccess(3),
						'items'=>array(
							array('label'=>'Selection Panel per Course', 'url'=>array('/selection/accepted/selection',)),
							array('label'=>'Mass Selection Panel', 'url'=>array('/selection/accepted/allapplicants',)),
							array('label'=>'Manage Sucessful Applicants', 'url'=>array('/selection/accepted/admin',)),
							array('label'=>'Successful Applicants (with Contacts)', 'url'=>array('/selection/accepted/list')),
							array('label'=>'Change Course for Applicant', 'url'=>array('/selection/accepted/changeCourse',)),
							
						),
				),
				
				//admission
				array('label'=>'Admission', 		
						'url'=>array('/admission'),	
						//'icon'=>'book',
						'visible'=>Yii::app()->user->checkAccess(3),
						'items'=>array(
							array('label'=>'Verify Admission Requirements', 'url'=>array('/admission/student/verify',)),
							array('label'=>'Admit new Student', 'url'=>array('/admission/student/admit',)),
							array('label'=>'Admit Continuing Student', 'url'=>array('/admission/student/continualAdmission',)),
							array('label'=>'Manage Students', 'url'=>array('/admission/student/admin',)),
							array('label'=>'Manage Admission', 'url'=>array('/admission/admission/admin',)),
						
						),
				),
				
				//student finance
				array('label'=>'Finance', 	
						'url'=>'#',		
						//'icon'=>'briefcase',
						'visible'=>Yii::app()->user->checkAccess(2),
						'items'=>array(
							array('label'=>'APPLICATION FEES'),
							array('label'=>'Enter Application Fees', 'icon'=>'pencil', 	'url'=>array('/finance/applicationFees/create',)),
							array('label'=>'Mange Application Fees', 'icon'=>'th',	'url'=>array('/finance/applicationFees/admin',)),
							array('label'=>'STUDENT RECEIPTS'),
							array('label'=>'Receive Fees Payment', 'icon'=>'pencil', 'url'=>array('/finance/studentReceipt/pay',)),
							array('label'=>'Mange Student Fees', 'icon'=>'th',	'url'=>array('/finance/studentReceipt/admin',)),
							array('label'=>'STUDENT INVOICE'),
							array('label'=>'Invoice a Class', 'icon'=>'pencil', 'url'=>array('/finance/studentInvoice/create',)),
							array('label'=>'Invoice a Student',  'icon'=>'pencil', 'url'=>array('/finance/studentInvoice/invoiceStudent',)),
							array('label'=>'Manage Invoices', 'icon'=>'th',	'url'=>array('/finance/studentInvoice/admin',)),
							array('label'=>'FEE STATEMENT'),
							array('label'=>'Check Student Fee Statement', 'icon'=>'pencil', 'url'=>array('/admission/student/statement',)),
							array('label'=>'Check Fee Statement(Previous Student)', 'icon'=>'pencil', 'url'=>array('/setup/previousStudent/statement',)),
							array('label'=>'Fees Structure','icon'=>'th', 'url'=>array('/finance/feePayable/admin',)),
						),
						
				),
				
				//reports
				//array('label'=>'Reports', 			'url'=>array('site/page'), 		'visible'=>Yii::app()->user->checkAccess(1)),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
               
				/* array('label'=>'Student','icon'=>'cog', 'url'=>'#', 'items'=>array(
							array('label'=>'Add a student', 'url'=>array('/setup/previousStudent/create'),),
							array('label'=>'Check Fee Statement', 'url'=>array('/setup/previousStudent/statement'), ),
						),
					),*/
				 array('label'=>'','icon'=>'cog', 'url'=>'#', 
								'visible'=>(Yii::app()->user->id==1),
				 'items'=>array(
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
					array('label'=>'POLYMIS'),
					array('label'=>'Manage Academic Year Calendar', 'url'=>array('/setup/academicYear/admin'),),
					array('label'=>'Manage Semesters/ Terms', 'url'=>array('/setup/semester/admin'),),
					array('label'=>'Manage Programme Classes', 'url'=>array('/setup/courseClass/admin'),),
					array('label'=>'Manage Previous Students', 'url'=>array('/setup/previousStudent/admin'),),
					array('label'=>'Admit Previous Student', 'url'=>array('/setup/previousStudent/admit'),),
					array('label'=>'Manage Previous Students Statements', 'url'=>array('/setup/previousStudent/statement'),),
					array('label'=>'Manage Previous Students Debits', 'url'=>array('/setup/previousStudentDebit/admin'),),
					array('label'=>'Manage Previous Students Credits', 'url'=>array('/setup/previousStudentCredit/admin'),),
					array('label'=>'STUDENT FINANCE'),
					array('label'=>'Manage Unuiverisity Bank Accounts', 'url'=>array('/setup/bankaccount/admin'),),
					array('label'=>'Manage Statutory Fees', 'url'=>'#'),
					array('label'=>'Manage Programme Fees', 'url'=>'#'),
					array('label'=>'SYSTEM USERS AND ROLES'),
					array('label'=>'Manage Users', 'url'=>array('/user/user/admin'),'visible'=>Yii::app()->user->checkAccess(1)),
					array('label'=>'Manage Audit Trail', 'url'=>array('/auditTrail/admin'),),
					
					
                )),
				//array('label'=>'Profile', 'icon'=>'user', 'url'=>'#'),
				
				array('label'=>'', 'visible'=>!Yii::app()->user->isGuest,
				 'icon'=>'user',
				 'url'=>'#', 'items'=>array(
							array('label'=>'Go to my profile', 'url'=>array('/user/user/view&id='.Yii::app()->user->id),),
							array('label'=>'Logout', 'url'=>array('/site/logout'))
						),
				),
				//array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
            ),
        ),
		//'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
    ),
	)); ?>
		
	</div><!-- mainmenu -->

	<?php //$this->widget('zii.widgets.CBreadcrumbs', array(
		//'links'=>$this->breadcrumbs,
	//)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div style="clear:both"></div>
	

</div><!-- page -->


<div id="footer">

<div class="copyright">

		<div id="copyright">
		The portal has been designed, developed & being maintained by the Diractorate of ICT Services. All inquiries should be directed to webmaster@tukenya.ac.ke<br/>
		Copyright &copy; <?php echo date('Y'); ?> The Technical University of Kenya. All Rights Reserved.<br/>
		</div>
		<?php //echo Yii::powered(); 
		
		//echo 'Rights'.Yii::app()->user->getRole();
		?>
</div>
</div><!-- footer -->

</body>
</html>