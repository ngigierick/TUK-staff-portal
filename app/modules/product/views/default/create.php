<h1 class="form-title">Create New Product</h1>

<?php echo CHtml::beginForm(array('create'), 'post', array(
    'class' => 'product-form',
    'enctype' => 'multipart/form-data' // Required for file upload
)); ?>

<?php if ($product->hasErrors()): ?>
    <div class="error-summary">
        <?php echo CHtml::errorSummary($product); ?>
    </div>
<?php endif; ?>

<div class="form-group">
    <?php echo CHtml::label('Name', 'name'); ?>
    <?php echo CHtml::textField('Products[name]', $product->name, array('class' => 'form-control')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::label('Description', 'description'); ?>
    <?php echo CHtml::textArea('Products[description]', $product->description, array('class' => 'form-control')); ?>
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
    <?php echo CHtml::label('Upload Image', 'image'); ?>
    <?php echo CHtml::fileField('Products[image]', '', array('class' => 'form-control')); ?>
</div>

<div class="form-actions">
    <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary')); ?>
</div>

<?php echo CHtml::endForm(); ?>
