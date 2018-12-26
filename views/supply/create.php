<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Supply */

$this->title = 'Новый заказ сырья';
$this->params['breadcrumbs'][] = ['label' => 'Заказы сырья', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supply-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
