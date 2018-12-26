<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wood */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Номенклатура деревьев', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wood-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
