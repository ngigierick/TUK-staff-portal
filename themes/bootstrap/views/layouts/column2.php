<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="row">
		<div class="span9">
			<div id="content">
				<?php echo $content; ?>
			</div><!-- content -->
		</div>
		<div class="span2">
			<div id="sidebar">
			<?php if (!empty(Yii::app()->user->id)):?>
				<?php $this->widget('bootstrap.widgets.TbMenu', array(
					'type'=>'list',
					'items'=>Yii::app()->linkManager->favourites(),
				)); ?>
			<?php endif;?>
			<?php $this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'list',
				'items'=>Yii::app()->linkManager->quickLinks(),
			)); ?>
			<?php if (!empty(Yii::app()->user->id)):?>
				<?php $this->widget('bootstrap.widgets.TbMenu', array(
					'type'=>'list',
					'items'=>Yii::app()->linkManager->services(),
				)); ?>
			<?php endif;?>
				<?php $this->widget('bootstrap.widgets.TbMenu', array(
					'type'=>'list',
					'items'=>Yii::app()->linkManager->webLinks(),
				)); ?>
			
			</div><!-- sidebar -->
		</div>
		
</div>
<?php $this->endContent(); ?>