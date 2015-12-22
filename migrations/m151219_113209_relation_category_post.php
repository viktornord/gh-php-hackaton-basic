<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_113209_relation_category_post extends Migration
{
    public function safeUp()
    {
        $this->createTable('category_post', [
            'category_id' => $this->integer()->notNull(),
            'post_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('FK-category-post_category_id', 'category_post', 'category_id', 'category', 'id');
        $this->addForeignKey('FK-category-post_post_id', 'category_post', 'post_id', 'posts', 'id');
    }

    public function safeDown()
    {

        $this->dropTable('category_post');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
