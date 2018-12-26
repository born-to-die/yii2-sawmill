<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SupplySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supply-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'vendor_id') ?>

    <?= $form->field($model, 'wood_id') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'diameter') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'arrived') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
