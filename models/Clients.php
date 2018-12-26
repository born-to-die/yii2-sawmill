<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Clients".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $mobile
 *
 * @property ClientsOrders[] $clientsOrders
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Clients';
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
    public function getClientsOrders()
    {
        return $this->hasMany(ClientsOrders::className(), ['client_id' => 'id']);
    }
}
