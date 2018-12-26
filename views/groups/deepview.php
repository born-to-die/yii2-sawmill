<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Crew */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="crew-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group')->dropDownList(ArrayHelper::map(app\models\Groups::find()->all(), 'id', 'name'),
        [
            'prompt'=>'Значение не выбрано' // то что нам надо
        ]
        )
        
    ?>  

    <?= Html::submitButton('Показать', ['class' => 'btn btn-success']) ?>
	
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label' => 'ФИО',
                'attribute' => 'fullname',
                'value' => 'fullname',
            ],
            [
                'label' => 'Дата рождения',
                'attribute' => 'birth',
                'value' => 'birth',
            ],
            [
                'label' => 'Адрес',
                'attribute' => 'address',
                'value' => 'address',
            ],
            [
                'label' => 'Телефон',
                'attribute' => 'mobile',
                'value' => 'mobile',
            ],
            //'registr',
            [
                'label' => 'Отдел',
                'attribute' => 'depart_id',
                'value' => 'group.name',
            ],
            [
                'label' => 'Должность',
                'attribute' => 'job_id',
                'value' => 'job.name',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	
    <?php ActiveForm::end(); ?>

</div>