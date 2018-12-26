<?php

namespace app\models;

use Yii;
use app\models\Supply;
use app\models\Wood;
/**
 * This is the model class for table "StockSupply".
 *
 * @property int $id
 * @property int $wood_id
 * @property int $price
 * @property double $length
 * @property double $diameter
 * @property int $count
 * @property double $volume
 *
 * @property Shifts[] $shifts
 * @property Wood $wood
 */
class StockSupply extends \yii\db\ActiveRecord
{
    public $order;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'StockSupply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wood_id', 'price', 'length', 'diameter', 'count', 'volume'], 'required'],
            [['wood_id', 'price', 'count', 'order'], 'integer'],
            [['length', 'diameter', 'volume'], 'number'],
            [['wood_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wood::className(), 'targetAttribute' => ['wood_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
   public function getShifts()
    {
        return $this->hasMany(Shifts::className(), ['stocksupply_id' => 'id']);
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wood_id' => 'Номенклатура дерева',
            'price' => 'Цена',
            'length' => 'Длина',
            'diameter' => 'Диаметр',
            'count' => 'Количество',
            'volume' => 'Объем шт',
            'order' => 'Номер заказа',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWood()
    {
        return $this->hasOne(Wood::className(), ['id' => 'wood_id']);
    }

    public function myvalidate() {

        $order = Supply::find()->where(['id' => $this['order']])->one();

        $order['arrived'] = '1';
        $order->save();

        $this['wood_id'] = $order['wood_id'];  
        $this['price'] = $order['price'];
        $this['length'] = $order['length'];
        $this['diameter'] = $order['diameter'];
        $this['volume'] = $order['volume'];
        $this['count'] = $order['count'];

        $data = StockSupply::find()
            ->where(['wood_id' => $this['wood_id']])
            ->where(['price' => $this['price']])
            ->where(['length' => $this['length']])
            ->where(['diameter' => $this['diameter']])
            ->where(['volume' => $this['volume']])
            ->one();

        if(!empty($data)) {
            $data['count'] = $data['count'] + $order['count'];                        
            $data->save();
            return false;
        }

        return true;
    }

    public function getFullAttrs() {

        $wood = Wood::find()
            ->where(['id' => $this->wood_id])
            ->one();

        return '#' . $this->id . ' ' . $wood['name'] . ' Длина: ' . $this->length . ' Диаметр: ' . $this->diameter . ' Количество: ' . $this->count;
    }

}
