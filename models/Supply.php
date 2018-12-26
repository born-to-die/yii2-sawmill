<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SupplyOrders".
 *
 * @property int $id
 * @property string $date
 * @property int $vendor_id
 * @property int $wood_id
 * @property int $price
 * @property double $length
 * @property double $diameter
 * @property int $count
 * @property double $volume
 * @property int $arrived
 *
 * @property Vendor $vendor
 * @property Wood $wood
 */
class Supply extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'SupplyOrders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'vendor_id', 'wood_id', 'price', 'length', 'diameter', 'count', 'volume'], 'required'],
            [['date'], 'safe'],
            [['vendor_id', 'wood_id', 'price', 'count', 'arrived'], 'integer'],
            [['length', 'diameter', 'volume'], 'number'],
            [['vendor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::className(), 'targetAttribute' => ['vendor_id' => 'id']],
            [['wood_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wood::className(), 'targetAttribute' => ['wood_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'date' => 'Дата',
            'vendor_id' => 'Поставщик',
            'wood_id' => 'Порода',
            'price' => 'Стоимость',
            'length' => 'Длина в м',
            'diameter' => 'Диаметр в м',
            'count' => 'Количество',
            'volume' => 'Объем в м3',
            'arrived' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['id' => 'vendor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWood()
    {
        return $this->hasOne(Wood::className(), ['id' => 'wood_id']);
    }

    public function myvalidation() {
        $this['arrived'] = 0;
        return true;
    }

    public function getFullAttrs() {

        $wood = Wood::find()
            ->where(['id' => $this->wood_id])
            ->one();

        return '#' . $this->id . ' ' . $this->date . ' ' . $wood['name'] . ' ' . ' Длина: ' . $this->length .' Диаметр: ' . $this->diameter . ' Кол-во: ' . $this->count;

    }

    public function getArrivedWord() {
        switch ($this->arrived) {
            case 0:
                return 'не прибыл';
                break;

            case 1:
                return 'прибыл';
                break;

            default:
                return 'ошибка';
                break;
        }
    }

}
