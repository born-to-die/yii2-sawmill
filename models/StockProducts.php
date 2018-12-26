<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "StockProducts".
 *
 * @property int $id
 * @property int $material_id
 * @property int $wood_id
 * @property double $length
 * @property double $height
 * @property double $width
 * @property int $count
 * @property double $volume
 * @property int $price
 *
 * @property Materials $material
 * @property Wood $wood
 */
class StockProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'StockProducts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['material_id', 'wood_id', 'length', 'height', 'width', 'count', 'volume', 'price'], 'required'],
            [['material_id', 'wood_id', 'count', 'price'], 'integer'],
            [['length', 'height', 'width', 'volume'], 'number'],
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
            'id' => 'Номер',
            'material_id' => 'Продукт',
            'wood_id' => 'Дерево',
            'length' => 'Длина',
            'height' => 'Высота',
            'width' => 'Ширина',
            'count' => 'Количество',
            'volume' => 'Объем',
            'price' => 'Стоимость',
        ];
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
}
