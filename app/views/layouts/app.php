<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38466350-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
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
	//  99-Student
	//////////////
	
	$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'null', // null or 'inverse'
    'brand'=>'<span id="brand">Online Application Portal</span>',
    'brandUrl'=>'http://portal.tukenya.ac.ke/index.php?r=courseApplication',
    'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
			'htmlOptions'=>array('class'=>'pull-left'),
            'items'=>array(
			
				array('label'=>'TU-K site',	 'icon'=>'home', 'url'=>'http://www.tukenya.ac.ke',),
				
				array('label'=>'Login', 'url'=>array('/courseApplication/default/login'), 	'visible'=>Yii::app()->user->isGuest),
			

            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
								
				array('label'=>Yii::app()->user->name, 'visible'=>!Yii::app()->user->isGuest,
				 'icon'=>'user',
				 'url'=>'#', 'items'=>array(
							
							array('label'=>'Go to my Profile', 'icon'=>'user','url'=>array('//courseApplication/default/profile'),),
							array('label'=>'Go to my Mailbox', 'icon'=>'envelope', 'url'=>array('//courseApplication/personalDetails/mailbox'),),
							array('label'=>'Send Mail', 'icon'=>'pencil', 'url'=>array('//courseApplication/personalDetails/sendMail'),),
							array('label'=>'Change Password', 'icon'=>'lock','url'=>array('//courseApplication/personalDetails/password'),),
							array('label'=>'Help', 'icon'=>'lock','url'=>array('//courseApplication/default/help'),),
							array('label'=>'Logout', 'icon'=>'eye-close','url'=>array('//site/logout'))
						),
				),
				array(
				'label'=>'Help', 
				'icon'=>'flag', 
				'visible'=>Yii::app()->user->isGuest,
				'url'=>array('//courseApplication/default/help')
				),
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
		The portal has been designed, developed & being maintained by the Directorate of ICT Services. All inquiries should be directed to webmaster@tukenya.ac.ke<br/>
		Copyright &copy; <?php echo date('Y'); ?> <a href="www.tukenya.ac.ke">The Technical University of Kenya</a>. All Rights Reserved.<br/>
		</div>
		<?php //echo Yii::powered(); 
		
		//echo 'Rights'.Yii::app()->user->getRole();
		?>
</div>
</div><!-- footer -->

</body>
</html>