<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        // NEW TABLE
        $table = '{{%user}}';
        $this->createTable($table, [
            'id'                   => $this->primaryKey(),
            'username'             => $this->string(255)->notNull(),
            'nama'                 => $this->string(255)->notNull(),
            'auth_key'             => $this->string(255)->notNull(),
            'password_hash'        => $this->string(255)->notNull(),
            'password_reset_token' => $this->string(255),
            'email'                => $this->string(255)->notNull(),
            'role'                 => 'enum("1", "2") NOT NULL DEFAULT "1" COMMENT "1. Master, 2.User"',
            'status'               => 'enum("1", "2") NOT NULL DEFAULT "1" COMMENT "0. Tidak Aktif, 1. Aktif, 2. Suspend"',
            'created_at'           => $this->integer(),
            'updated_at'           => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
