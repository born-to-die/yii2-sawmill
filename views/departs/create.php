<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Departs */

$this->title = 'Create Departs';
$this->params['breadcrumbs'][] = ['label' => 'Departs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
