<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StockProducts */

$this->title = 'Update Stock Products: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stock Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
