<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>

<?php $ajax = ($this->enable_ajax_validation) ? 'true' : 'false'; ?>

<?php echo '<?php '; ?>
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => <?php echo $ajax; ?>,
));
<?php echo '?>'; ?>


	<p class="note">
		<?php echo "<?php echo Yii::t('app', 'Fields with'); ?> <span class=\"required\">*</span> <?php echo Yii::t('app', 'are required'); ?>"; ?>.
	</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php foreach ($this->tableSchema->columns as $column): ?>
<?php if (!$column->autoIncrement): ?>
		
		<?php echo "<?php " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
		
<?php endif; ?>
<?php endforeach; ?>
<div class="form-actions">
<?php echo "\t<?php \$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>\$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	";?>
</div>
<?php echo "<?php	
\$this->endWidget();
?>\n"; ?>
