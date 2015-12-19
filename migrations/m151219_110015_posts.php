<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_110015_posts extends Migration
{
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'author' => $this->string(15),
            'body' => $this->text()
        ]);
    }

    public function down()
    {
        $this->dropTable('posts');
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
