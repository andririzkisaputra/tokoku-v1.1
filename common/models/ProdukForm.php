<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "produk".
 *
 * @property int $produk_id
 * @property string|null $kategori_id
 * @property string|null $nama_produk
 * @property string|null $qty
 * @property string|null $gambar
 * @property string|null $is_delete 0. Delete, 1.Aktif
 * @property string|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class ProdukForm extends \yii\db\ActiveRecord implements CartPositionInterface
{

    // const SCENARIO_CREATE = 'create';
    use CartPositionTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produk';
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
            [['nama_produk', 'qty', 'gambar'], 'required'],
            [['is_delete'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['qty'], 'string', 'max' => 11],
            [['nama_produk'], 'string', 'max' => 255],
            ['gambar', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'produk_id' => 'Produk ID',
            'kategori_id' => 'Kategori ID',
            'nama_produk' => 'Nama Produk',
            'qty' => 'Qty',
            'gambar' => 'Gambar',
            'is_delete' => 'Is Delete',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getId()
    {
        return $this->produk_id;
    }

    public function getPrice()
    {
        return $this->harga;
    }

    // public function setQuantity()
    // {
    //     return $this->qty;
    // }
    //
    // public function getQuantity()
    // {
    //     return $this->qty;
    // }
}
