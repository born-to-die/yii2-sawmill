<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StockProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Склад продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'material_id',
                'value' => 'material.name',
            ],
            [
                'attribute' => 'wood_id',
                'value' => 'wood.name',
            ],
            'length',
            'height',
            'width',
            'count',
            'volume',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
