<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pembayaran}}`.
 */
class m211230_030708_create_pembayaran_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        // NEW TABLE
        $table = '{{%pembayaran}}';
        $this->createTable($table, [
            'pembayaran_id' => $this->primaryKey(),
            'pembayaran'    => $this->string(45),
            'is_active'     => 'enum("0", "1") NOT NULL DEFAULT "1" COMMENT "0. Tidak Aktif, 1.Aktif"',
            'gambar'        => $this->string(255),
            'admin'         => $this->string(255),
            'created_by'    => $this->integer(11),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pembayaran}}');
    }
}
