<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Post".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $excerpt
 * @property string $text
 * @property string $keywords
 * @property string $description
 * @property string $created
 *
 * @property Category $category
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'excerpt', 'text', 'created'], 'required'],
            [['category_id'], 'integer'],
            [['text'], 'string'],
            [['created'], 'safe'],
            [['title', 'excerpt', 'keywords', 'description'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'category_id' => 'Категория',
            'title' => 'Название',
            'excerpt' => 'Краткое описание',
            'text' => 'Текст',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание',
            'created' => 'Создано',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
