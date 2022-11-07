<?php

use yii\db\Migration;

/**
 * Class m211230_032430_insert_user
 */
class m211230_032430_insert_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}',array(
            'username'      => 'andri007',
            'nama'          => 'Andri Rizki Saputra',
            'auth_key'      => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'email'         => 'andri.rizki@gmail.com',
            'role'          => '1',
            'status'        => '1',
            'created_at'    => time(),
            'updated_at'    => time(),
        ));
        $this->insert('{{%user}}',array(
            'username'      => 'admin',
            'nama'          => 'Andri Rizki Saputra',
            'auth_key'      => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'email'         => 'andri.rizki@gmail.com',
            'role'          => '1',
            'status'        => '1',
            'created_at'    => time(),
            'updated_at'    => time(),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211230_032430_insert_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211230_032430_insert_user cannot be reverted.\n";

        return false;
    }
    */
}
