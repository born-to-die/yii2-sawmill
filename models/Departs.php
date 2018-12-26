<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Departs".
 *
 * @property int $id
 * @property string $name
 *
 * @property Crew[] $crews
 */
class Departs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Departs';
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
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrews()
    {
        return $this->hasMany(Crew::className(), ['depart_id' => 'id']);
    }
}
