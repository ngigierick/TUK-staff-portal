<?php $this->renderPartial("//site/common/notifications"); ?>
<h1>Staff Documents</h1>


	<?php echo Yii::app()->utility->downloads();?>

	<div class="span6">
	<h5>Confidential! Accessible by TU-K Staff Only</h5>
			<?php /** @var BootActiveForm $form */
			$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
				//'action'=>Yii::app()->createUrl('/site/search/'),
				'id'=>'searchForm',
				'method'=>'get',
				'type'=>'search',
				 'htmlOptions' => array('enctype' => 'multipart/form-data'),
			)); 
			
			?>
		
			<?php echo CHtml::textField('term','',array('id'=>'fullSearch','placeholder'=>'Find document by title or description',));?>
			&nbsp;&nbsp;&nbsp;&nbsp;
				<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'warning',
				'icon'=>'search',
				'label'=>'GO',
			)); ?>
		  <?php
		$this->endWidget();
		?>
		
		<?php if(isset($data)):?>
				<?php if(!empty($term)):?>
				<?php $total = count($data); if ($total<1):?>
				<h3 class="t">Showing  No Results for <b><i><?php echo $term;?> </i></b> </h3>
				<?php elseif ($total<2):?>
					<h3 class="t">Showing  <?php echo number_format($total, 0, '', ', ');?> Result for <b><i><?php echo $term;?> </i></b> </h3>
				<?php elseif ($total>1):?>
					<h3 class="t">Showing  <?php echo number_format($total, 0, '', ', ');?> Results for <b><i><?php echo $term;?> </i></b> </h3>
				<?php else:?><h2>Latest staff documents uploaded</h2>
				<?php endif;?>
		<?php endif;?>
			<br/>
			<?php foreach($data as $d) :?>
				<?php
					
				?>
				<?php $l = '<h5 class="link">'.$d->title.'</h5>'; echo GxHtml::link($l, array('/portal/profile/documentView', 'id' => $d->id));?>
					<p><?php echo $d->description;?>
					| <?php echo GxHtml::link('<span class="icon-user"> </span> view document...', array('/portal/profile/documentView', 'id' => $d->id));?><hr />
			<?php endforeach;?>
	<?php endif;?>
</div>
	
