<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\Groups;
use app\models\Jobs;

/* @var $this yii\web\View */
/* @var $model app\models\Crew */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="crew-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_id')->textInput()->dropDownList(ArrayHelper::map(app\models\Groups::find()->all(), 'id', 'name'))?>

    <?= $form->field($model, 'job_id')->dropDownList(ArrayHelper::map(app\models\Jobs::find()->all(), 'id', 'name'))?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
