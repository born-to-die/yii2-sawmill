<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>

<style>
table {
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  border-collapse: collapse;
  color: #686461;
  width: 100%;
}
caption {
  padding: 10px;
  color: white;
  background: #8FD4C1;
  font-size: 18px;
  text-align: left;
  font-weight: bold;
}
th {
  border-bottom: 3px solid #B9B29F;
  padding: 10px;
  text-align: left;
}
td {
  padding: 10px;
}
tr:nth-child(odd) {
  background: white;
}
tr:nth-child(even) {
  background: #E8E6D1;
}
#current-orders-block caption {
  background: #d2d48f;
}
</style>

<h1>Заказы сырья</h1>

<div id = "current-orders-block">
  <table>
    <caption> Текущие заказы сырья </caption>
    <tr>
      <th>№</th>
      <th>Дата</th>
      <th>Поставщик</th>
      <th>Порода</th>   
      <th>Кол-во</th>
      <th>Статус</th>
      <th>Цена</th>
    </tr>

    <?php 
    $price_sum = 0;
    foreach($supplyorders as $order): 
    
    ?>
      <?php 
        if(
          $order->arrived == 0 
        ) {
          $price_sum += $order->price;
      ?>
      <tr>
        <td> <?= $order->id ?> </td>
        <td> <?= $order->date ?> </td>
        <td> <?= $order->vendor->name ?> </td>  
        <td> <?= $order->wood->name ?> </td>
        <td> <?= $order->count ?> </td>
        <td> <?= $order->arrivedword ?> </td>
        <td> <?= $order->price ?> </td>
          </tr>

        <?php 
          }
          ?>

    <?php endforeach; ?>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> <b> Сумма: </b> </td>
      <td> <?= $price_sum ?> </td>
    </tr>
  </table>
</div>

<br>

<div id = "arrived-orders-block">
  <table>
    <caption> Текущие заказы сырья </caption>
    <tr>
      <th>№</th>
      <th>Дата</th>
      <th>Поставщик</th>
      <th>Порода</th>   
      <th>Кол-во</th>
      <th>Статус</th>
      <th>Цена</th>
    </tr>

    <?php 
    $price_sum = 0;
    foreach($supplyorders as $order): 
    
    ?>
      <?php 
        if(
          $order->arrived == 1 
        ) {
          $price_sum += $order->price;
      ?>
      <tr>
        <td> <?= $order->id ?> </td>
        <td> <?= $order->date ?> </td>
        <td> <?= $order->vendor->name ?> </td>  
        <td> <?= $order->wood->name ?> </td>
        <td> <?= $order->count ?> </td>
        <td> <?= $order->arrivedword ?> </td>
        <td> <?= $order->price ?> </td>
          </tr>

        <?php 
          }
          ?>

    <?php endforeach; ?>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> <b> Сумма: </b> </td>
      <td> <?= $price_sum ?> </td>
    </tr>
  </table>
</div>