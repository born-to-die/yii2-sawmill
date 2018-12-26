<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Wood".
 *
 * @property int $id
 * @property string $name
 *
 * @property SupplyOrders[] $supplyOrders
 */
class Wood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Wood';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplyOrders()
    {
        return $this->hasMany(SupplyOrders::className(), ['wood_id' => 'id']);
    }
}
