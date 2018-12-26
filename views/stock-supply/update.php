<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StockSupply */

$this->title = 'Update Stock Supply: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stock Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-supply-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
