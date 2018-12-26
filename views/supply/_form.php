<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Wood;
use app\models\Vendor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Supply */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supply-form">

    <?php
        $this->registerJs('

            function updateVolume() {
                return (
                    (Math.PI * 
                    Math.pow((document.getElementById(
                        "supply-diameter"
                    ).value / 2), 
                    2)) * document.getElementById("supply-length").value
                );
            }

            $(".form-control").focus(function(){ 
                document.getElementById("supply-volume").value = 
                updateVolume();
            });'
        );
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(),
        [
            'name' => 'check_issue_date',
            'value' => date('yyyy-mm-dd'),
            'options' => ['placeholder' => 'Выберите дату'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ])?>

    <?= $form->field($model, 'vendor_id')->dropDownList(ArrayHelper::map(app\models\Vendor::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'wood_id')->dropDownList(ArrayHelper::map(app\models\Wood::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'diameter')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'volume')->textInput(['placeholder' => ''])->hint('Введите, если объем известен')?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
