<?php

use yii\helpers\Html;


$this->title = 'Лесопилка';
?>

<h1>Новости</h1>
<?php foreach($posts as $post): ?>
 <div class="panel panel-default">
 <div class="panel-heading">
 <h3 class="panel-title"><?= $post->title ?></h3>  	
<p>Категория: <?= $post->category ? $post->category->name : null ?></p>
 </div>
 <div class="panel-body">
 <?= $post->text ?>
 </div>
 </div>
<?php endforeach; ?>