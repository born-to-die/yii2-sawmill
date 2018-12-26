<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StockSupplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Склад сырья';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-supply-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Отгрузить заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'wood_id',
                'value' => 'wood.name',
            ],
            'price',
            'length',
            'diameter',
            'count',
            'volume',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
