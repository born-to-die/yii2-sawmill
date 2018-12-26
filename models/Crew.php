<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Crew".
 *
 * @property int $id
 * @property string $fullname
 * @property string $birth
 * @property string $address
 * @property string $mobile
 * @property string $registr
 * @property int $group_id
 * @property int $job_id
 *
 * @property Groups $group
 * @property Jobs $job
 */
class Crew extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Crew';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'birth', 'address', 'mobile', 'registr', 'group_id', 'job_id'], 'required'],
            [['birth'], 'safe'],
            [['group_id', 'job_id'], 'integer'],
            [['fullname', 'address', 'registr'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 12],
            [['mobile'], 'unique'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jobs::className(), 'targetAttribute' => ['job_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'ФИО',
            'birth' => 'Дата рождения',
            'address' => 'Адрес',
            'mobile' => 'Телефон',
            'registr' => 'Регистрация',
            'group_id' => 'Группа',
            'job_id' => 'Должность',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Jobs::className(), ['id' => 'job_id']);
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['crew_id' => 'id']);
    }
}
