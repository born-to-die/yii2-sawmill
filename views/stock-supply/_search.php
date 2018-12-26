<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StockSupplySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-supply-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'wood_id') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'length') ?>

    <?= $form->field($model, 'diameter') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
