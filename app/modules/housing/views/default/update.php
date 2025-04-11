<?php 
/* @var $this DefaultController */
/* @var $model Housing */

$this->breadcrumbs = array(
    'Housing' => array('index'),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage Housing', 'url' => array('index')),
    array('label' => 'View Housing', 'url' => array('view', 'id' => $model->id)),
);

?>

<h1>Update Housing</h1>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'housing-form',
    'enableAjaxValidation' => false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<!-- House Name -->
<div class="row">
    <?php echo $form->labelEx($model, 'housename'); ?>
    <?php echo $form->textField($model, 'housename', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->error($model, 'housename'); ?>
</div>

<!-- Location -->
<div class="row">
    <?php echo $form->labelEx($model, 'location'); ?>
    <?php echo $form->textField($model, 'location', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->error($model, 'location'); ?>
</div>

<!-- Housing Type -->
<div class="row">
    <?php echo $form->labelEx($model, 'type_id'); ?>
    <?php echo $form->dropDownList($model, 'type_id', CHtml::listData(HousingTukHouseType::model()->findAll(), 'id', 'name')); ?>
    <?php echo $form->error($model, 'type_id'); ?>
</div>

<!-- Rent -->
<div class="row">
    <?php echo $form->labelEx($model, 'rent'); ?>
    <?php echo $form->textField($model, 'rent', array('size' => 10)); ?>
    <?php echo $form->error($model, 'rent'); ?>
</div>

<!-- Submit Button -->
<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>
