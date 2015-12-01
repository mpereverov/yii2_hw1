<?php

use yii\db\Schema;
use yii\db\Migration;

class m151129_082600_create_table_candidate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%candidate}}', [
                'id' => $this->primaryKey(),
                'firstname' => $this->string()->notNull(),
                'lastname' => $this->string()->notNull(),
                'gender' => $this->integer()->notNull(),
                'age' => $this->integer()->notNull(),
                'marital_status' => $this->integer()->notNull(),
                'speciality' => $this->integer()->notNull(),
                'education' => $this->integer()->notNull(),
                'special_skill' => $this->string(),
                'experience' => $this->integer()->notNull(),
                'recommendations' => $this->integer()->notNull(),
                'photo' => $this->string()->notNull(),
                'email' => $this->string()->notNull()->unique(),
            ], $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%candidate}}');
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
