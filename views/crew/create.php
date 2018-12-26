<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Crew */

$this->title = 'Персонал';
$this->params['breadcrumbs'][] = ['label' => 'Добавить', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crew-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
