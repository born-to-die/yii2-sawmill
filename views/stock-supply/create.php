<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StockSupply */

$this->title = 'Отгрузить заказ';
$this->params['breadcrumbs'][] = ['label' => 'Склад сырья', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-supply-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
