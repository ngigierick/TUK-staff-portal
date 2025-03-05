<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>

<h1><?php echo Yii::t('app', 'TuSOFT - Technical University Software'); ?></h1>

<?php echo CHtml::image(Yii::app()->baseUrl.'/images/tuk-logo.png','Logo',array()); ?>
<h2>Student Management System - <?php echo GxHtml::encode($model->name); ?></h2>

<div class="profile">
<?php if(!empty($model->photo)):?>
<?php echo CHtml::image(Yii::app()->baseUrl.'/images/'.$model->photo,'Passport photo',array('width'=>500)); ?>
<?php elseif ($model->gender_id===1):?>
<?php echo CHtml::image(Yii::app()->baseUrl.'/images/passports/male.jpg','Passport photo',array('height'=>100)); ?>
<?php else:?>
<?php echo CHtml::image(Yii::app()->baseUrl.'/images/passports/female.jpg','Passport photo',array('height'=>100)); ?>
<?php endif;?>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed bordered',
	'data' => $model,
	'attributes' => array(
'name',
'postal_address',
'physical_address',
'telephone',
'email',
'fax',
'date_modified:datetime',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
        array('label'=>'APPLICATION NAVIGATION LINKS'),
        array('label'=>'Home', 'icon'=>'home', 'url'=>array('/site/'), 'active'=>true),
        //application
		array('label'=>'Application', 		
						'url'=>'#',
						'icon'=>'pencil',						
						'visible'=>Yii::app()->user->checkAccess(3),
						'items'=>array(
							array('label'=>'Enrol new applicant', 'url'=>array('/intake/applicant/enroll',)),
							array('label'=>'Manage applicants', 'url'=>array('/intake/applicant/admin'))
						),
		),
		//selection
		array('label'=>'Selection', 		
						'url'=>'#',		
						'icon'=>'thumbs-up',
						'visible'=>Yii::app()->user->checkAccess(3),
						'items'=>array(
							array('label'=>'Selection Panel per Course', 'url'=>array('/selection/accepted/selection',)),
							array('label'=>'Mass Selection Panel', 'url'=>array('/selection/accepted/allapplicants',)),
							array('label'=>'Manage Sucessful Applicants', 'url'=>array('/selection/accepted/admin',)),
							array('label'=>'Successful Applicants (with Contacts)', 'url'=>array('/selection/accepted/list')),
							
						),
				),
				
		//admission
		array('label'=>'Admission', 		
						'url'=>array('/admission'),	
						'icon'=>'book',
						'visible'=>Yii::app()->user->checkAccess(3),
						'items'=>array(
							array('label'=>'Verify Admission Requirements', 'url'=>array('/admission/student/verify',)),
							array('label'=>'Admit new Student', 'url'=>array('/admission/student/admit',)),
							array('label'=>'Manage Students', 'url'=>array('/admission/student/admin',)),
						
						),
			),
		//student finance
		array('label'=>'Student Finance', 	
						'url'=>'#',		
						'icon'=>'briefcase',
						'visible'=>Yii::app()->user->checkAccess(2),
						'items'=>array(
							array('label'=>'Fees Structure', 'url'=>array('/finance/feepayable/admin',)),
							array('label'=>'Application Fees', 'url'=>array('/finance/applicationFees/admit',)),
							array('label'=>'Receipts', 'url'=>array('/admission/student/admin',)),
							array('label'=>'Invoices', 'url'=>array('/admission/student/admin',)),
						),
						
		),
        array('label'=>'SYSTEM CONFIGURATIONS'),
        array('label'=>'Setup','icon'=>'cog', 'url'=>'#', 
								'visible'=>Yii::app()->user->checkAccess(1),
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
					//array('label'=>'Manage User Groups', 'url'=>array('/rights'),),
					

					
                )),
				
		array('label'=>'Profile ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest,
				 'icon'=>'user',
				 'url'=>'#', 'items'=>array(
							array('label'=>'Go to my profile', 'url'=>array('/user/user/view&id='.Yii::app()->user->id),),
							array('label'=>'Logout', 'url'=>array('/site/logout'))
						),
				),
		array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
    ),
)); ?>

