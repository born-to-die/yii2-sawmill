<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Shipments".
 *
 * @property int $id
 * @property string $date
 * @property int $order_id
 *
 * @property ClientsOrders $order
 */
class Shipments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Shipments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'order_id'], 'required'],
            [['date'], 'safe'],
            [['order_id'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientsOrders::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер отгрузки',
            'date' => 'Дата',
            'order_id' => 'Номер заказа',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(ClientsOrders::className(), ['id' => 'order_id']);
    }

    public function myvalidate() {

        $clientorder = ClientsOrders::find()->where(['id' => $this->order_id])->one();

        $product = StockProducts::find()
            ->where(['wood_id' => $clientorder['wood_id']])
            ->where(['material_id' => $clientorder['material_id']])
            ->where(['length' => $clientorder['length']])
            ->where(['width' => $clientorder['width']])
            ->where(['height' => $clientorder['height']])            
            ->where(['volume' => $clientorder['volume']])
            ->where(['price' => $clientorder['price']])
            ->one();

        if($product['count'] < $clientorder['count']) {
            echo "
                <script>
                    alert('Ошибка. На складе меньше продукта чем в заказе');
                </script>
            ";

            return false;

        }

        $product['count'] = $product['count'] - $clientorder['count'];

        $product->save();

        $clientorder['completed'] = 2;
        $clientorder->save();

        return true;
    }
}
