<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $name
 * @property string $author
 * @property string $body
 *
 * @property mixed categories
 */
class Post extends ActiveRecord
{
    public $categories_id;

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
            [['author'], 'string', 'max' => 15],
            [['categories_id'], 'safe']
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
    public function getCategories(){

        return $this->hasMany(Category::className(),['id'=>'category_id'])
            ->viaTable('category_post',['post_id'=>'id']);
    }
}
