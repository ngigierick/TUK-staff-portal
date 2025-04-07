<h1>Update Product</h1>

<?php echo CHtml::beginForm(); ?>

<div>
    <?php echo CHtml::label('Name', 'name'); ?>
    <?php echo CHtml::textField('Products[name]', $product->name); ?>
</div>

<div>
    <?php echo CHtml::label('Price', 'price'); ?>
    <?php echo CHtml::textField('Products[price]', $product->price); ?>
</div>

<div>
    <?php echo CHtml::label('Category', 'category'); ?>
    <?php echo CHtml::dropDownList('Products[category]', $product->category, array(
        'clothes' => 'Clothes',
        'accessories' => 'Accessories',
        'tech' => 'Tech'
    )); ?>
</div>

<div>
    <?php echo CHtml::label('Image', 'image'); ?>
    <?php echo CHtml::fileField('Products[image]'); ?>
</div>

<div>
    <?php echo CHtml::submitButton('Update'); ?>
</div>

<?php echo CHtml::endForm(); ?>
