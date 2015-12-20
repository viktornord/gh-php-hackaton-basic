<?php

use yii\db\Schema;
use yii\db\Migration;

class m151220_204436_comments_for_posts extends Migration
{
    public function safeUp()
    {
        $this->createTable('posts_comments', [
            'id' => $this->primaryKey(),
            'author_name' => $this->string(15)->notNull(),
            'post_id' => $this->integer()->notNull(),
            'body' => $this->text()->notNull()
        ]);

        $this->addForeignKey('fk_comments_posts', 'posts_comments', 'post_id', 'posts', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('posts_comments');
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
