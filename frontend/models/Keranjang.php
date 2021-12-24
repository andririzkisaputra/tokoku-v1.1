<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "keranjang".
 *
 * @property int $keranjang_id
 * @property string|null $produk_id
 * @property string|null $qty
 * @property string|null $harga
 * @property string $is_selected
 * @property string|null $created_by
 * @property int|null $created_at
 * @property int|null $modified_at
 */
class Keranjang extends \yii\db\ActiveRecord implements CartPositionInterface
{

    use CartPositionTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'keranjang';
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
            [['is_selected'], 'string'],
            [['created_at', 'updated_at', 'qty'], 'integer'],
            [['produk_id'], 'string', 'max' => 11],
            [['harga'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'keranjang_id' => 'Keranjang ID',
            'produk_id' => 'Produk ID',
            'qty' => 'Qty',
            'harga' => 'Harga',
            'is_selected' => 'Is Selected',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
        ];
    }

    public function getPrice()
    {
        return $this->harga;
    }

    public function getId()
    {
        return $this->keranjang_id;
    }

    /**
     * {@inheritdoc}
     * @return KeranjangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KeranjangQuery(get_called_class());
    }
}
