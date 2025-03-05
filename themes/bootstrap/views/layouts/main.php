<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width">
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="teal">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="teal">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="teal">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->linkManager->mediaBaseURL();?>/general/favicon.ico" mce_href="<?php echo Yii::app()->linkManager->mediaBaseURL();?>/general/favicon.ico"/>
	<meta name="keywords" content="<?php if(isset($this->keyWords)) echo CHtml::encode($this->keyWords); ?>" />
	<meta name="description" content="<?php  if(isset($this->description)) echo CHtml::encode($this->description); ?>" />
	<?php Yii::app()->bootstrap->register();?>

</head>

<body>

<div id="page">
	<?php 
	$this->widget('bootstrap.widgets.TbNavbar', array(
    //'type'=>'null', // null or 'inverse'
    'brand'=>'<img class="logo" src="'.Yii::app()->linkManager->mediaBaseURL().'/general/logo.png" alt="logo" /> <span class="tusoft">Staff ePortal</span>',
    'brandUrl'=>Yii::app()->linkManager->siteUrl(),
    'collapse'=>true,
	//'fluid'=>true,
    'items'=>array(
		
        array(
            'class'=>'bootstrap.widgets.TbMenu',
			'htmlOptions'=>array('class'=>'pull-left'),
            'items'=>array(
				
				array('label'=>'Home',
					'url'=>array('//portal/profile/home')
				),
				array('label'=>Yii::app()->user->name, 'visible'=>!Yii::app()->user->isGuest,
					'url'=>'#', 'items'=>Yii::app()->linkManager->services(1),
				),
				array('label'=>'Login',	'visible'=>Yii::app()->user->isGuest,
					'url'=>array('//site/login')
				),
				array('label'=>'Quick Links',
					'url'=>'#', 'items'=>Yii::app()->linkManager->quickLinks(1),	
				),		
				
				array(
				'label'=>'Help', 
					'url'=>array('//portal/profile/help')
				),		
            ),
        ),
      // '<form action="site" class="navbar-search pull-right" method="post" ><input type="text" class="search-query span2" placeholder="Search portal"><button type="submit">GO</button></form>',
		
    ),
	)); ?>
		
	
<div class="container">
	<?php echo $content; ?>
</div><!-- container -->
<br /><br />
</div><!-- page -->
<div id="footer">
<div class="container">
	<div class="span2"> 
	<?php $this->widget('zii.widgets.CMenu', array('items'=>Yii::app()->linkManager->quickLinks()));?>
	<br /><br />
		Join our Social Network 
		<?php Yii::app()->utility->socialMediaLinks($this);?>
		<br /><br />
	</div>
	<div class="span3"> 
	<?php if (isset(Yii::app()->user->id)):?>
	<?php $this->widget('zii.widgets.CMenu', array('items'=>Yii::app()->linkManager->services()));?>
	<?php endif;?>
	<?php $this->widget('zii.widgets.CMenu', array('items'=>Yii::app()->linkManager->webLinks()));?>
	
	</div>
	<div class="span4">
		<?php echo Institution::logo();?>
		<?php echo Institution::contacts();?>
		<br /><br />
		<?php echo Institution::isoCertifiedMark();?><br/><br/>
		<?php $l = Yii::app()->utility->visitPageUrl(); ?>
		Powered by <a href="<?php echo $l;?>http://dicts.tukenya.ac.ke" target="_blank">Directorate of ICT Services</a>.
		Copyright &copy; 2012 - <?php echo date('Y'); ?> <a href="<?php echo $l;?>http://www.tukenya.ac.ke" target="_blank">The Technical University of Kenya</a>. All Rights Reserved.<br/>

	</div>
	
		
	
</div>
	
</div><!-- footer -->
</body>
</html>