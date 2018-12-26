<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use yii\widgets\ActiveForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);



    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            ['label' => 'Главная', 'url' => ['/post/index']],

            ['label' => 'Новости', 
            'visible' => Yii::$app->user->can("manager"),
            'items' => [
                ['label' => 'Список новостей', 'url' => ['/post/list']],
                ['label' => 'Список категорий', 'url' => ['/category/index']],
            ]],

            ['label' => 'Отчёты', 
            'visible' => Yii::$app->user->can("manager"),
            'items' => [
                ['label' => 'Заказы клиентов', 'url' => ['/clients-orders-report/index']],
                ['label' => 'Заказы сырья', 'url' => ['/supply-orders-report/index']],
            ]],

            ['label' => 'Производство', 
            'visible' => Yii::$app->user->can("master"),
            'items' => [
                ['label' => 'Номенклатура продукции', 'url' => ['/materials/index']],
                ['label' => 'Производство', 'url' => ['/shifts/index']],
                ['label' => 'Номенклатура деревьев', 'url' => ['/wood/index']],
            ]],

            ['label' => 'Заказы', 
            'visible' => Yii::$app->user->can("manager"),
            'items' => [
                ['label' => 'Заказы сырья', 'url' => ['/supply/index']],
                ['label' => 'Склад сырья', 'url' => ['/stock-supply/index']],
				['label' => 'Поставщики', 'url' => ['/vendor/index']],				
                ['label' => 'Список клиентов', 'url' => ['/clients/index']],
                ['label' => 'Заказы клиентов', 'url' => ['/clients-orders/index']],
                ['label' => 'Отгрузки', 'url' => ['/shipments/index']],
                ['label' => 'Склад продукции', 'url' => ['/stock-products/index']],
            ]],
			
			['label' => 'Управление', 
            'visible' => Yii::$app->user->can("manager"),
            'items' => [
                ['label' => 'Список сотрудников', 'url' => ['/crew/index']],
				['label' => 'Список должностей', 'url' => ['/jobs/index']],
				['label' => 'Список групп', 'url' => ['/groups/index']],
				['label' => 'Просмотр группы', 'url' => ['/groups/deepview']],
            ]],
            
            ['label' => 'Администрирование', 
            'visible' => Yii::$app->user->can('admin'),
            'items' => [
                ['label' => 'Создать пользователя', 'url' => ['/site/signup']],
                ['label' => 'Таблица пользователей', 'url' => ['/user/index']],
                ['label' => 'Доступ пользователей', 'url' => ['/auth-assignment/index']],
                ['label' => 'Средства доступа', 'url' => ['/auth-item/index']],
                ['label' => 'Назначения ролей', 'url' => ['/auth-item-child/index']],
                ['label' => 'Добавить пользователя', 'url' => ['/site/signup']],
            ]],

            Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/site/login']]

            ) : (
                ' <li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Пилорама <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
