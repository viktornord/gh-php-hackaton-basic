<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_111313_category_name_not_null extends Migration
{
    public function up()
    {
        $this->alterColumn('category', 'name', $this->string()->notNull());
    }

    public function down()
    {
        echo "m151219_111313_category_name_not_null cannot be reverted.\n";

        return false;
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
