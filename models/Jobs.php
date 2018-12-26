<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Jobs".
 *
 * @property int $id
 * @property string $name
 *
 * @property Crew[] $crews
 */
class Jobs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Jobs';
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
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrews()
    {
        return $this->hasMany(Crew::className(), ['job_id' => 'id']);
    }
}
