<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%keranjang}}`.
 */
class m211230_030242_create_keranjang_table extends Migration
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
        $table = '{{%keranjang}}';
        $this->createTable($table, [
            'keranjang_id'  => $this->primaryKey(),
            'produk_id'     => $this->string(11)->notNull(),
            'pembayaran_id' => $this->string(11)->notNull(),
            'transaksi_id'  => $this->string(11)->notNull(),
            'qty'           => $this->integer(11)->notNull(),
            'harga'         => $this->string(45)->notNull(),
            'is_selected'   => 'enum("0", "1") NOT NULL DEFAULT "0" COMMENT "0. Keranjang, 1.Transaksi"',
            'created_by'  => $this->integer(11)->notNull(),
            'created_at'  => $this->integer(),
            'updated_at'  => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%keranjang}}');
    }
}
