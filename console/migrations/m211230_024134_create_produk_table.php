<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%produk}}`.
 */
class m211230_024134_create_produk_table extends Migration
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
        $table = '{{%produk}}';
        $this->createTable($table, [
            'produk_id'   => $this->primaryKey(),
            'kategori_id' => $this->string(11)->notNull(),
            'nama_produk' => $this->string(255)->notNull(),
            'qty'         => $this->string(11)->notNull(),
            'harga'       => $this->string(45)->notNull(),
            'gambar'      => $this->string(255)->notNull(),
            'is_delete' => 'enum("0", "1") NOT NULL DEFAULT "1" COMMENT "0. Delete, 1.Aktif"',
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
        $this->dropTable('{{%produk}}');
    }
}
