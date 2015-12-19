<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $name
 * @property string $author
 * @property string $body
 *
 * @property CategoryPost[] $categoryPosts
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'author' => 'Author',
            'body' => 'Body',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryPosts()
    {
        return $this->hasMany(CategoryPost::className(), ['post_id' => 'id']);
    }
}
