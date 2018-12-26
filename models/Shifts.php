<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Shifts".
 *
 * @property int $id
 * @property int $group_id
 * @property int $stocksupply_id
 * @property int $stocksupply_count
 * @property int $order_id
 * @property string $date
 *
 * @property Groups $group
 * @property ClientsOrders $order
 * @property StockSupply $stocksupply
 */
class Shifts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Shifts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'stocksupply_id', 'stocksupply_count', 'order_id', 'date'], 'required'],
            [['group_id', 'stocksupply_id', 'stocksupply_count', 'order_id'], 'integer'],
            [['date'], 'safe'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientsOrders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['stocksupply_id'], 'exist', 'skipOnError' => true, 'targetClass' => StockSupply::className(), 'targetAttribute' => ['stocksupply_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'group_id' => 'Группа',
            'stocksupply_id' => 'Номер сырья',
            'stocksupply_count' => 'Кол-во сырья',
            'order_id' => 'Заказ',
            'date' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(ClientsOrders::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocksupply()
    {
        return $this->hasOne(StockSupply::className(), ['id' => 'stocksupply_id']);
    }

    public function myvalidate() {

        $clientorder = ClientsOrders::find()->where(['id' => $this->order_id])->one();

        $shift = Shifts::find()->where(['order_id' => $this->order_id])->one();

        $stocksupply = StockSupply::find()->where(['id' => $this->stocksupply_id])->one();

        if($stocksupply['count'] >= $this->stocksupply_count) {

            $stocksupply['count'] = $stocksupply['count'] - $this->stocksupply_count;
                $stocksupply->save();

            $product = StockProducts::find()
            ->where(['wood_id' => $clientorder['wood_id']])
            ->where(['material_id' => $clientorder['material_id']])
            ->where(['length' => $clientorder['length']])
            ->where(['width' => $clientorder['width']])
            ->where(['height' => $clientorder['height']])            
            ->where(['volume' => $clientorder['volume']])
            ->where(['price' => $clientorder['price']])
            ->one();

            if(empty($product)) {
                $product = new StockProducts();
                $product['material_id'] = $clientorder['material_id'];
                $product['wood_id'] = $clientorder['wood_id'];
                $product['length'] = $clientorder['length'];
                $product['height'] = $clientorder['height'];
                $product['width'] = $clientorder['width'];
                $product['count'] = $clientorder['count'];
                $product['volume'] = $clientorder['volume'];
                $product['price'] = $clientorder['price'];
                $product->save();
            }
            else {
                $product['count'] = $product['count'] + $this->count;
                $product->save();
            }

            $clientorder['completed'] = 1;
            $clientorder->save();

            return true;

        }
        else {
            echo "
                <script>
                    alert('Недостатоно сырья на складе');
                </script>
            ";
            return false;
        }
    }

}
