<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Groups".
 *
 * @property int $id
 * @property string $name
 *
 * @property Crew[] $crews
 * @property Shifts[] $shifts
 */
class Groups extends \yii\db\ActiveRecord
{
    public $group;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['group'], 'integer'],
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
            'name' => 'Группа',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrews()
    {
        return $this->hasMany(Crew::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShifts()
    {
        return $this->hasMany(Shifts::className(), ['group_id' => 'id']);
    }
}
