<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Shipments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shipments-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <?= $form->field($model, 'order_id')->dropDownList(ArrayHelper::map(app\models\ClientsOrders::find()->where(['completed' => '1'])->all(), 'id', 'fullattrs')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
