<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "kategori".
 *
 * @property int $kategori_id
 * @property string|null $nama_kategori
 * @property string|null $is_delete 0. Delete, 1.Aktif
 * @property string|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori';
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
            [['nama_kategori'], 'required'],
            [['is_delete'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['nama_kategori'], 'string', 'max' => 255],
            // [['created_by'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kategori_id' => 'Kategori ID',
            'nama_kategori' => 'Nama Kategori',
            'is_delete' => 'Is Delete',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return KategoriQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KategoriQuery(get_called_class());
    }
}
