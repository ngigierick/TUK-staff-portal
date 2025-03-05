
<h1><?php echo  GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
<hr/>
<?php	$this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'bordered condensed',
	'data' => $model,
	'attributes' => array(
	'content:html',
	'date_added:datetime',
	'date_modified:datetime',
	)

)); ?>
<fieldset>
	<legend>
	<h2><?php echo GxHtml::encode($model->getRelationLabel('projectActivities')); ?> Under <?php echo $model->name;?></h2>
	</legend>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->projectActivities as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::valueEx($relatedModel);
		echo '<hr/>';
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>
</fieldset>