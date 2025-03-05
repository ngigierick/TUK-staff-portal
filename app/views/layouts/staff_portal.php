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
	<meta name="keywords" content="<?php if(isset($this->keyWords)) echo CHtml::encode($this->keyWords); ?>" />
	<meta name="description" content="<?php  if(isset($this->description)) echo CHtml::encode($this->description); ?>" />
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
    'brand'=>'<span id="brand">Staff e-Portal</span>',
    'brandUrl'=>'http://staff.tukenya.ac.ke',
    'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
			'htmlOptions'=>array('class'=>'pull-left'),
            'items'=>array(
			
				array('label'=>'Home',	 //'icon'=>'home',
				'url'=>array('//portal/profile/home')),
				array('label'=>'Web Links',
				 //'icon'=>'globe',
				 'url'=>'#', 'items'=>array(
				 										
							array('label'=>'External Links'),
							array('label'=>'TU-K Main Website', 'icon'=>'globe','url'=>'http://tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
							array('label'=>'TU-K Library Website', 'icon'=>'book','url'=>'http://library.tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
							//array('label'=>'TU-K Digital Repository Website', 'icon'=>'server','url'=>'http://tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
							//array('label'=>'Students Important Downloads', 'icon'=>'download-alt','url'=>'http://tukenya.ac.ke/dean_of_students','linkOptions'=>array('target'=>'_blank'),),
							//array('label'=>'Students Official Email through Google', 'icon'=>'envelope','url'=>'https://mail.google.com/a/students.tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
							
						),
						
					
				),
				array('label'=>'Services',
				// 'icon'=>'group',
				 'url'=>'#', 'items'=>array(
				 
				 			array('label'=>'Staff List ', 'icon'=>'user','url'=>array('//portal/profile/list')),							
							array('label'=>'ICT Support Request', 'icon'=>'book','url'=>array('//portal/ictServiceRequest/admin')),
							array('label'=>'Staff Official Email (@tukenya.ac.ke)', 'icon'=>'envelope','url'=>'https://mail.tukenya.ac.ke/owa','linkOptions'=>array('target'=>'_blank'),),
							array('label'=>'Student Class Lists', 'icon'=>'list','url'=>'http://ar.tukenya.ac.ke/class-list/','linkOptions'=>array('target'=>'_blank'),),
							array('label'=>'Staff Official Documents', 'icon'=>'download-alt','url'=>'http://docs.tukenya.ac.ke','linkOptions'=>array('target'=>'_blank'),),
							array('label'=>'Compliments/Complaints ', 'icon'=>'thumbs-up','url'=>array('//portal/ictServiceRequest/suggestion')),
							array('label'=>'Help', 'icon'=>'flag','url'=>array('//portal/profile/help')),
						
							
						),
						
					
				),			
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
								
				array('label'=>Yii::app()->user->name, 'visible'=>!Yii::app()->user->isGuest,
				// 'icon'=>'user',
				 'url'=>'#', 'items'=>array(
							
							array('label'=>'My Public Profile', 'icon'=>'globe','url'=>array('//portal/profile/fullProfile'),),
							array('label'=>'Download Public Profile ', 'icon'=>'print', 'url'=>array('//portal/profile/fullProfile','pdf'=>1),),
							array('label'=>'My Personal Profile', 'icon'=>'user','url'=>array('//portal/profile/personalInfo'),),
							array('label'=>'Change Password', 'icon'=>'lock','url'=>array('//portal/profile/password'),),
							array('label'=>'Logout', 'icon'=>'eye-close','url'=>array('//site/logout'))
						),
				),
				array(
				'label'=>'Help', 
				//'icon'=>'flag', 
				'visible'=>Yii::app()->user->isGuest,
				'url'=>array('//portal/profile/help')
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
	<table>
		<tr>
			<td class="social">

	Join our Social Network 
		<?php 
		
		$this->widget('application.extensions.socialLink.socialLink', array(
			    'style'=>'right', //alignment - left, right
			    'top'=>'10',  //in percentage
			        'media' => array(
			        'facebook'=>array(
			            'url'=>'http://www.facebook.com/pages/Technical-University-of-Kenya/521080071256112?ref=hl',
			            'target'=>'_blank',
			        ),
			        'twitter'=>array(
			            'url'=>'http://www.twitter.com/TU_Kenya',
			            'target'=>'_blank',
			        ),
			        'google-plus'=>array(
			            'url'=>'http://www.youtube.com/channel/UCIXSdHCnWl8DIzvyjzFuMJw',
			            'target'=>'_blank',
			        ),
			       
			      )
			));
		?>
		
		</td>
		<td>
		The portal has been designed, developed & is being maintained by the Directorate of ICT Services.<br/>
		Copyright &copy; <?php echo date('Y'); ?> <a href="www.tukenya.ac.ke">The Technical University of Kenya</a>. All Rights Reserved.<br/>
		</td>
		</tr>
	</table>
		</div>
		
</div>
</div><!-- footer -->

</body>
</html>