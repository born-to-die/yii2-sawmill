<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Supply;
/* @var $this yii\web\View */
/* @var $model app\models\StockSupply */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-supply-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order')->dropDownList(ArrayHelper::map(app\models\Supply::find()->where(['arrived' => '0'])->all(), 'id', 'fullattrs')) ?>

    <div class="form-group">
        <?= Html::submitButton('Отгрузить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
