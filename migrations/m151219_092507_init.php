<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_092507_init extends Migration
{
    public function up()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->defaultValue('unnamed category')
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
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
