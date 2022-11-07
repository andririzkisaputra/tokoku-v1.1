<?php

use yii\db\Migration;

/**
 * Class m221107_024351_add_pembayaran
 */
class m221107_024351_add_pembayaran extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->db->createCommand()->batchInsert('{{%pembayaran}}', ['pembayaran', 'is_active', 'gambar', 'created_by', 'created_at', 'updated_at'], [
            ['FasaPay', 1, 'fasapay.jpeg', 1, time(), time()],
            ['Tunai', 0, 'tunai.png', 1, time(), time()],
            ['QRIS', 1, 'qr.png', 1, time(), time()],
            ['VA', 1, 'qr.png', 1, time(), time()]
        ])->execute();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221107_024351_add_pembayaran cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221107_024351_add_pembayaran cannot be reverted.\n";

        return false;
    }
    */
}
