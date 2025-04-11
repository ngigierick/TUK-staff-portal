<?php
/* @var $this ProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Products',
);

$this->menu=array(
    array('label'=>'Create Product', 'url'=>array('create')),
);

?>

<h1>Products</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'products-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id',
        'name',
        'description',
        'price',
        'category',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {update} {delete}', // Buttons for view, update, delete
        ),
    ),
)); ?>

