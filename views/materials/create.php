<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Materials */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Производство', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materials-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
