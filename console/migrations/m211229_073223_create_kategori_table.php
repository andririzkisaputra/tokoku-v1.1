<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kategori}}`.
 */
class m211229_073223_create_kategori_table extends Migration
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
        $table = '{{%kategori}}';
        $this->createTable($table, [
            'kategori_id'  => $this->primaryKey(),
            'nama_kategori' => $this->string(255)->notNull(),
            'is_delete' => 'enum("0", "1") NOT NULL DEFAULT "1" COMMENT "0. Delete, 1.Aktif"',
            'created_by'    => $this->integer(11)->notNull(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($table);
    }
}
