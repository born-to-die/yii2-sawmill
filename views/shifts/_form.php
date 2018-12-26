<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\StockSupply;
use app\models\ClientsOrders;
use app\models\Groups;


/* @var $this yii\web\View */
/* @var $model app\models\Shifts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shifts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(app\models\Groups::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'stocksupply_id')->dropDownList(ArrayHelper::map(app\models\StockSupply::find()->where(['<>', 'count', '0'])->all(), 'id', 'fullattrs')) ?>

    <?= $form->field($model, 'stocksupply_count')->textInput() ?>

    <?= $form->field($model, 'order_id')->dropDownList(ArrayHelper::map(app\models\ClientsOrders::find()->where(['completed' => '0'])->all(), 'id', 'fullattrs')) ?>

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

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
