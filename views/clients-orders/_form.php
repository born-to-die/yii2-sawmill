<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Clients;
use app\models\Wood;
use app\models\Materials;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ClientsOrders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-orders-form">

    <?php
        $this->registerJs('

            function updateVolume() {
                return (
                    document.getElementById(
                        "clientsorders-height"
                    ).value 
                    *
                    document.getElementById(
                        "clientsorders-width"
                    ).value
                    *
                    document.getElementById(
                        "clientsorders-length"
                    ).value 
                );
            }

            $(".form-control").focus(function(){ 
                document.getElementById("clientsorders-volume").value = 
                updateVolume()
            });'
        );
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map(app\models\Clients::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(),
        [
            'name' => 'check_issue_date',
            'value' => date('yyyy-mm-dd'),
            'options' => ['placeholder' => 'Select issue date ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ])?>

    <?= $form->field($model, 'material_id')->dropDownList(ArrayHelper::map(app\models\Materials::find()->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'wood_id')->dropDownList(ArrayHelper::map(app\models\Wood::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
