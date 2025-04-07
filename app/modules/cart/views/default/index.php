<?php
/* @var $this CartController */
/* @var $products Products[] */
/* @var $cartItems Cart[] */

$this->breadcrumbs = array(
    'Cart' => array('/cart'),
    'Products',
);
?>

<h1>Available Products</h1>

<?php if (!empty($products)): ?>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo CHtml::encode($product->name); ?></td>
                <td><?php echo CHtml::encode($product->description); ?></td>
                <td><?php echo CHtml::encode($product->price); ?></td>
                <td><?php echo CHtml::encode($product->stock); ?></td>
                <td>
                    <?php echo CHtml::link('Add to Cart', array('cart/add', 'id' => $product->id), array('class' => 'btn btn-primary')); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No products available.</p>
<?php endif; ?>


<h1>Your Cart</h1>

<?php if (!empty($cartItems)): ?>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php foreach ($cartItems as $cartItem): ?>
            <tr>
                <td><?php echo CHtml::encode($cartItem->product->name); ?></td>
                <td><?php echo CHtml::encode($cartItem->product->price); ?></td>
                <td>
                    <?php echo CHtml::textField('quantity', $cartItem->quantity, array(
                        'size' => 5, 
                        'onchange' => "updateCartItem($cartItem->id, this.value)"
                    )); ?>
                </td>
                <td><?php echo CHtml::encode($cartItem->product->price * $cartItem->quantity); ?></td>
                <td>
                    <?php echo CHtml::link('Remove', array('cart/remove', 'id' => $cartItem->id), array('class' => 'btn btn-danger')); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script>
        function updateCartItem(cartId, quantity) {
            window.location.href = '<?php echo Yii::app()->createUrl("cart/update"); ?>?id=' + cartId + '&quantity=' + quantity;
        }
    </script>

<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
