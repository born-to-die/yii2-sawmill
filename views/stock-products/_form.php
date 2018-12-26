<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StockProducts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'material_id')->dropDownList(ArrayHelper::map(app\models\Materials::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'wood_id')->dropDownList(ArrayHelper::map(app\models\Wood::find()->all(), 'id', 'name')) ?>


    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
