<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>

<?php echo "<?php \$form = \$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl(\$this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>\n"; ?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field = $this->generateInputField($this->modelClass, $column);
	if (strpos($field, 'password') !== false)
		continue;
?>
	
	<?php echo "<?php " . $this->generateSearchField($this->modelClass, $column)."; ?>\n"; ?>

<?php endforeach; ?>
	<div class="form-actions">
	<?php echo "\t<?php \$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>"
	?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

