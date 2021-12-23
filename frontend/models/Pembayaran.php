<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "pembayaran".
 *
 * @property int $pembayaran_id
 * @property string|null $pembayaran
 * @property string $is_active
 * @property string|null $gambar
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $upadate_at
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembayaran';
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
            [['is_active'], 'string'],
            [['created_by', 'created_at', 'upadate_at'], 'integer'],
            [['pembayaran'], 'string', 'max' => 45],
            [['gambar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pembayaran_id' => 'Pembayaran ID',
            'pembayaran' => 'Pembayaran',
            'is_active' => 'Is Active',
            'gambar' => 'Gambar',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'upadate_at' => 'Upadate At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PembayaranQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PembayaranQuery(get_called_class());
    }
}
