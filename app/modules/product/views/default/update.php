<?php
// Register the external CSS file
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/css/styles.css');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
</head>
<body>

<h1 class="form-title">Update Product</h1>

<?php echo CHtml::beginForm('', 'post', array('enctype' => 'multipart/form-data', 'class' => 'product-form')); ?>

<div class="form-group">
    <?php echo CHtml::label('Name', 'name'); ?>
    <?php echo CHtml::textField('Products[name]', $product->name, array('class' => 'form-control')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::label('Price', 'price'); ?>
    <?php echo CHtml::textField('Products[price]', $product->price, array('class' => 'form-control')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::label('Category', 'category'); ?>
    <?php echo CHtml::dropDownList('Products[category]', $product->category, array(
        'clothes' => 'Clothes',
        'accessories' => 'Accessories',
        'tech' => 'Tech'
    ), array('class' => 'form-control')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::label('Image', 'image'); ?>
    <?php echo CHtml::fileField('Products[image]', '', array('class' => 'form-control-file')); ?>
</div>

<div class="form-actions">
    <?php echo CHtml::submitButton('Update', array('class' => 'btn btn-primary')); ?>
</div>

<?php echo CHtml::endForm(); ?>

</body>
</html>
