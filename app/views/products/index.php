<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var string|null $selectedCategory */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Category Filter -->
    <div class="category-filter">
        <p>Filter by Category:</p>
        <?= Html::beginForm(['products/index'], 'get') ?>
        <?= Html::dropDownList('category', $selectedCategory, [
            '' => 'All Categories',
            'clothes' => 'Clothes',
            'accessories' => 'Accessories',
            'tech' => 'Tech',
        ], ['class' => 'form-control', 'onchange' => 'this.form.submit()']) ?>
        <?= Html::endForm() ?>
    </div>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'price',
            'category',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web/uploads/' . $data->image), ['width' => '70px']);
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
