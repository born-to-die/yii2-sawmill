<?php

namespace app\models;
use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $crew_id
 *
 * @property Crew $crew
 */

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;
    public $crew;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['crew_id'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['crew_id'], 'exist', 'skipOnError' => true, 'targetClass' => Crew::className(), 'targetAttribute' => ['crew_id' => 'id']],
        ];
    }
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getAuthAssignment()
    {
        return $this->hasOne(AuthAssignment::className(), ['id' => 'wood_id']);
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'crew_id' => 'Сотрудник'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrew()
    {
        return $this->hasOne(Crew::className(), ['id' => 'crew_id']);
    }
}