<?php

use yii\db\Migration;

/**
 * Class m221107_024539_add_produk
 */
class m221107_024539_add_produk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->db->createCommand()->batchInsert('{{%produk}}', ['kategori_id', 'nama_produk', 'qty', 'harga', 'gambar', 'is_delete', 'created_by', 'created_at', 'updated_at'], [
            [4, 'Bakso Granat', '100', '25000', 'bakso-granat-2021-12-20-04-43-10.jpg', 1, 1, time(), time()],
            [6, 'Pencil Warna', '100', '10500', 'pencil-warna-2021-12-20-04-33-10.jpg', 1, 1, time(), time()],
            [4, 'Nasi Goreng', '100', '13000', 'nasi-goreng-2021-12-20-04-25-09.jpg', 1, 1, time(), time()],
            [4, 'Nasi Goreng Gila', '100', '20000', 'nasi-goreng-gila-2021-12-20-04-31-09.jpg', 1, 1, time(), time()],
            [4, 'Bakso Beranak', '100', '18000', 'bakso-beranak-2021-12-20-04-24-10.jpg', 1, 1, time(), time()],
            [4, 'Bakso Merapi', '100', '11000', 'bakso-merapi-2021-12-20-04-18-10.jpg', 1, 1, time(), time()],
            [4, 'Bakso Jumbo', '100', '10000', 'bakso-jumbo-2021-12-20-04-10-10.jpg', 1, 1, time(), time()],
            [4, 'Bakso', '100', '5000', 'bakso-2021-12-20-04-02-10.jpg', 1, 1, time(), time()],
            [4, 'Nasi Goreng Spesial', '100', '10000', 'nasi-goreng-spesial-2021-12-20-04-14-09.jpg', 1, 1, time(), time()],
            [4, 'Nasi Goreng Bakso', '100', '15000', 'nasi-goreng-bakso-2021-12-20-04-15-08.jpg', 1, 1, time(), time()],
            [4, 'Nasi Goreng Sosis', '100', '18000', 'nasi-goreng-sosis-2021-12-20-04-08-09.jpg', 1, 1, time(), time()]
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221107_024539_add_produk cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221107_024539_add_produk cannot be reverted.\n";

        return false;
    }
    */
}
