<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClientsOrders */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Заказы клиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
