<?php
namespace app\components;
use yii\base\Widget;
class HiWidget extends Widget
{
 public function run()
 {
 	return $this->render('hi');
 }
}
?>