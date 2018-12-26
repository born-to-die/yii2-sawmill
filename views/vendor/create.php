<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vendor */

$this->title = 'Добавить клиента';
$this->params['breadcrumbs'][] = ['label' => 'Список клиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
