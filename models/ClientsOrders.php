<?php

namespace app\models;

use Yii;

use app\models\Wood;
use app\models\Materials;

/**
 * This is the model class for table "ClientsOrders".
 *
 * @property int $id
 * @property int $client_id
 * @property string $date
 * @property int $material_id
 * @property int $wood_id
 * @property double $length
 * @property double $height
 * @property double $width
 * @property int $count
 * @property double $volume
 * @property int $price
 * @property int $completed
 *
 * @property Clients $client
 * @property Materials $material
 * @property Wood $wood
 * @property Shipments[] $shipments
 */
class ClientsOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ClientsOrders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'date', 'material_id', 'wood_id', 'length', 'height', 'width', 'count', 'volume', 'price'], 'required'],
            [['client_id', 'material_id', 'wood_id', 'count', 'price', 'completed'], 'integer'],
            [['date'], 'safe'],
            [['length', 'height', 'width', 'volume'], 'number'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materials::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['wood_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wood::className(), 'targetAttribute' => ['wood_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ordered' => 'Дата',
            'client_id' => 'Клиент',
            'date' => 'Дата',
            'material_id' => 'Тип продукции',
            'width' => 'Ширина',
            'wood_id' => 'Тип породы',
            'length' => 'Длина',
            'height' => 'Высота',
            'diameter' => 'Diameter',
            'count' => 'Количество',
            'volume' => 'Объем шт',
            'price' => 'Цена шт',
            'completed' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Materials::className(), ['id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWood()
    {
        return $this->hasOne(Wood::className(), ['id' => 'wood_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipments()
    {
        return $this->hasMany(Shipments::className(), ['order_id' => 'id']);
    }

    public function pre() {
        $this['completed'] = 0;
        return true;
    }
    public function getFullAttrs() {

        $wood = Wood::find()
            ->where(['id' => $this->wood_id])
            ->one();

        $material = Materials::find()
            ->where(['id' => $this->material_id])
            ->one();

        return '#' . $this->id . ' ' . $wood['name'] . ' ' . $material['name'] .' Длина: ' . $this->length .' Ширина: ' . $this->width .' Высота: ' . $this->height . ' Кол-во: ' . $this->count;
    }

    public function getCompletedWord() {
        switch ($this->completed) {
            case 0:
                return 'ожидает';
                break;

            case 1:
                return 'на складе';
                break;

            case 2:
                return 'выполнен';
                break;

            default:
                return 'ошибка';
                break;
        }
    }

}
