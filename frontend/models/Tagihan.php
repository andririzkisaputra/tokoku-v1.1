<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tagihan".
 *
 * @property int $tagihan_id
 * @property int|null $transaksi_id
 * @property string|null $kode_tagihan
 * @property string|null $status_tagihan 1. menunggu pembayaran 2. menunggu konfirmasi pembayaran  3. dibayar4. batal  . gagal	
 * @property string|null $total_bayar
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Tagihan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagihan';
    }
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
      return [
          TimestampBehavior::className(),
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaksi_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['status_tagihan'], 'string'],
            [['kode_tagihan', 'total_bayar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tagihan_id' => 'Tagihan ID',
            'transaksi_id' => 'Transaksi ID',
            'kode_tagihan' => 'Kode Tagihan',
            'status_tagihan' => 'Status Tagihan',
            'total_bayar' => 'Total Bayar',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TagihanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagihanQuery(get_called_class());
    }
}
