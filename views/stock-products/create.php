<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StockProducts */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Склад продуктов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
