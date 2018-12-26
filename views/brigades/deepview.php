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

    <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map(app\models\Brigades::find()->all(), 'id', 'name')) ?>	
	
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                'value' => 'depart.name',
            ],
            [
                'label' => 'Должность',
                'attribute' => 'job_id',
                'value' => 'job.name',
            ],
			[
                'label' => 'Название бригады',
                'attribute' => 'brigade_id',
                'value' => 'brigade.name',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	
    <?php ActiveForm::end(); ?>

</div>