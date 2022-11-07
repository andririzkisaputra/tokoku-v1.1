<?php

use yii\db\Migration;

/**
 * Class m221107_022436_add_kategori
 */
class m221107_022436_add_kategori extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->db->createCommand()->batchInsert('{{%kategori}}', ['nama_kategori', 'is_delete', 'created_by', 'created_at', 'updated_at'], [
            ['Baju', 1, 1, time(), time()],
            ['Celana Js', 1, 1, time(), time()],
            ['Kaos', 1, 1, time(), time()],
            ['Makanan', 1, 1, time(), time()],
            ['Barang', 1, 1, time(), time()],
            ['Alat Tulis', 1, 1, time(), time()],
            ['Perlengkapan Rumah', 1, 1, time(), time()],
            ['Peralatan Dapur', 1, 1, time(), time()]
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221107_022436_add_kategori cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221107_022436_add_kategori cannot be reverted.\n";

        return false;
    }
    */
}
