<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Vendor".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $mobile
 *
 * @property SupplyOrders[] $supplyOrders
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Vendor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'mobile'], 'required'],
            [['name', 'address'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'name' => 'Название',
            'address' => 'Адрес',
            'mobile' => 'Телефон',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplyOrders()
    {
        return $this->hasMany(SupplyOrders::className(), ['vendor_id' => 'id']);
    }
}
