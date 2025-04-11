<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>

<h1>Products</h1>

<!-- Category Filter -->
<div class="category-filter">
    <p>Filter by Category:</p>
    <?php echo CHtml::beginForm(Yii::app()->createUrl('product/default/index'), 'get'); ?>
        <?php echo CHtml::dropDownList('category', isset($_GET['category']) ? $_GET['category'] : '', array(
            '' => 'All Categories (' . Products::model()->count() . ')',
            'clothes' => 'Clothes (' . Products::model()->count('category = :category', array(':category' => 'clothes')) . ')',
            'accessories' => 'Accessories (' . Products::model()->count('category = :category', array(':category' => 'accessories')) . ')',
            'tech' => 'Tech (' . Products::model()->count('category = :category', array(':category' => 'tech')) . ')',
        ), array('onchange' => 'this.form.submit();')); ?>
    <?php echo CHtml::endForm(); ?>
</div>

<p>
    <?php echo CHtml::link('Create Product', Yii::app()->createUrl('product/default/create'), array('class' => 'btn btn-success')); ?>
</p>

<!-- Product Table -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Filter products by category if selected
            $criteria = new CDbCriteria();
            if (isset($_GET['category']) && $_GET['category'] != '') {
                $criteria->addCondition('category = :category');
                $criteria->params = array(':category' => $_GET['category']);
            }

            // Fetch products based on the criteria
            $products = Products::model()->findAll($criteria);

            if (!empty($products)): 
                $i = 1;
                foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo CHtml::encode($product->name); ?></td>
                        <td>KES <?php echo CHtml::encode($product->price); ?></td>
                        <td><?php echo CHtml::encode($product->category); ?></td>
                        <td>
                            <?php if (!empty($product->image)): ?>
                                <img src="<?php echo Yii::app()->baseUrl . '/images/' . $product->image; ?>" width="70" />
                            <?php else: ?>
                                <span>No Image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            
                         
                        <?php echo CHtml::link('View', array('default/view', 'id' => $product->id)); ?> |
                            <?php echo CHtml::link('Update/edit', array('default/update', 'id' => $product->id)); ?> |
                            <?php echo CHtml::link('Delete', array('default/delete', 'id' => $product->id), array(
                                'confirm' => 'Are you sure you want to delete this product?'
                            )); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No products found.</td>
                </tr>
            <?php endif; ?>
    </tbody>
</table>

</body>
</html>
