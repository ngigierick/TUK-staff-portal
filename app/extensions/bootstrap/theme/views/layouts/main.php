<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>
<?php 	
		$role = (isset(Yii::app()->user->role)?Yii::app()->user->role:'');
		require_once(Yii::app()->basePath . "/views/layouts/custom/".Yii::app()->params['role'.$role]);
?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<div class="footer"> 
			<span id="clock"></span> :: <?php echo SystemUser::loggedIn();?> :: <?php echo Yii::app()->params['footer'];?>
		</div>		
	</div>

</div><!-- page -->

</body>
</html>
