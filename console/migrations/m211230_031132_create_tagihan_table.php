<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tagihan}}`.
 */
class m211230_031132_create_tagihan_table extends Migration
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
        $table = '{{%tagihan}}';
        $this->createTable($table, [
            'tagihan_id'     => $this->primaryKey(),
            'transaksi_id'   => $this->string(45)->notNull(),
            'kode_transaksi' => $this->string(255)->notNull(),
            'status_tagihan' => 'enum("1", "2", "3", "4", "5") NOT NULL DEFAULT "1" COMMENT "1. menunggu pembayaran 2. menunggu konfirmasi pembayaran 3. dibayar 4. batal 5. gagal"',
            'total_bayar'    => $this->string(255)->notNull(),
            'created_by'     => $this->integer(11)->notNull(),
            'created_at'     => $this->integer(),
            'updated_at'     => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tagihan}}');
    }
}
