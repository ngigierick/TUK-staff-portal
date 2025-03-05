<h1><?php echo  GxHtml::encode(GxHtml::valueEx($model)); ?></h1><hr />

<?php	$this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'striped condensed',
	'data' => $model,
	'attributes' => array(
		'title',
		'filename',
		'description',
		'date_added:datetime',
		'date_modified:datetime',
	),
)); ?>
<?php if (!empty($model->filename)):?>
	<?php $cert = Yii::app()->baseUrl.'/images/doc/'.$model->filename;?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'danger',
        'size'=>'medium',
		'icon'=>'download-alt',
        'label'=>'Download Document',
		'url'=>array('/portal/profile/documentDownload', 'id' => $model->id),
	)); ?>
	<?php else:?>
	<span class="icon-thumbs-down"> </span><span class="unread"> Missing</span>
<?php endif;?>
	

