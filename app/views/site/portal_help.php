<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    //'heading'=>'TuSOFT - Technical University Software ',
)); ?>

<h1>Help Desk - Students Online Portal</h1>

<?php if( !isset(Yii::app()->user->id)):?>
	
	<h1>Getting Started...</h1>
	
	
	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'user-form',
		'type'=> 'horizontal',	
	));
	?>
	
	<h2>Special Case! Student Email Address Retrieval</h2>
	<h4>To students who cannot log into the portal and would want to retrieve their email addresses:</h4>
	
	<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>

	Please enter your registration number here: <?php echo CHTml::textField('reg_number');?>
	<?php echo CHTml::submitButton('Retrieve Email Address');?>
	
	<?php $this->endWidget(); ?>
	
<?php endif;?>

	<h2>Logging into the Portal</h2>
	<p>
	For you to login, you MUST be a registered student of The Technical University of Kenya. Login using your registration number as your username, and ID/ Passport number as your password, if and only if, you have never logged in before and changed your password.
	Remember to change your password once you log in for the first time. If you cannot still log in, please enquire with the Admissions Office.
	<p> You can login 
	<?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'mini',
        'label'=>'here',
		'url'=>array('/site/login'),
    )); ?>
	</p>
	
	<h2>Services Offered by the Portal</h2>
	<p>In the portal, a student is able to receive the following services:</p>
	<ul>
	<li>Updated Fee Statement<sup>Coming Soon!</sup></li>
	<li>Student Profile: Details Pertaining to Student such as Course being pursued, year of study, personal information, contact details, next of kin, among others</li>

	<li>Examination Results <sup>Coming Soon!</sup>
	<li>Registration of Course Units <sup>Coming Soon!</sup>
	</ul>
	
	</p>

 
<?php $this->endWidget(); ?>