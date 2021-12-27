<?php

namespace common\models;

use Yii;
use yii\base\Model;
// use app\models\Produk;
use backend\models\Produk;
use app\models\Keranjang;
use yii\db\Query;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;

class Api extends Model
{

  public function registrasi($post)
  {
    $modelUser = new User;
    $modelUser->username = $post['username'];
    $modelUser->nama     = $post['nama'];
    $modelUser->email    = $post['email'];
    $modelUser->role     = '2';
    $modelUser->setPassword($post['password']);
    $modelUser->generateAuthKey();
    // if ($modelUser->save()) {
    //   $response  = [
    //     'code'    => 201,
    //     'status'  => 'sukses',
    //     'data'    => $modelUser,
    //     'message' => 'berhasil!'
    //   ];
    // } else {
    //   $response  = [
    //     'code'    => 401,
    //     'status'  => 'error',
    //     'data'    => [],
    //     'message' => 'gagal!'
    //   ];
    // }
    return $modelUser->save();
  }

  public function get_join_tabel(
    $where = false,
    $where_like = false,
    $limit = false,
    $start = false,
    $order_by,
    $tabel,
    $tabelJoin,
    $selectJoin,
    $select = '*',
    $tabelJoinDua = false,
    $selectJoinDua = false
  ) {
    $semua = new Query;
    $semua->select($select);
    $semua->from($tabel)->leftJoin($tabelJoin, $selectJoin);
    if ($tabelJoinDua && $selectJoinDua) {
      $semua->leftJoin($tabelJoinDua, $selectJoinDua);
    }
    if ($where) {
      $semua->where($where);
    }
    if ($where_like) {
      $semua->andWhere($where_like);
    }
    if ($limit) {
      $semua->offset($start)->limit($limit);
    }
    $semua->orderBy([$order_by => SORT_DESC]);
    return $semua->all();
  }

  public function get_join_tabel_by($where = false, $where_like = false, $limit = false, $start = false, $order_by, $tabel, $tabelJoin, $selectJoin, $select = '*', $tabelJoinDua = false ,$selectJoinDua = false)
  {
    $semua = new Query;
    $semua->select($select);
    $semua->from($tabel)->leftJoin($tabelJoin, $selectJoin);
    if ($tabelJoinDua && $selectJoinDua) {
      $semua->leftJoin($tabelJoinDua, $selectJoinDua);
    }
    if ($where) {
      $semua->where($where);
    }
    if ($where_like) {
      $semua->andWhere($where_like);
    }
    if ($limit) {
      $semua->offset($start)->limit($limit);
    }
    $semua->orderBy([$order_by => SORT_DESC]);
    return $semua->one();
  }

  public function get_tabel($where = false, $where_like = false, $limit = false, $start = false, $order_by, $tabel)
  {
    $semua = new Query;
    $semua->from($tabel);
    if ($where) {
      $semua->where($where);
    }
    if ($where_like) {
      $semua->andWhere($where_like);
    }
    $semua->offset($start)->limit($limit);
    $semua->orderBy([$order_by => SORT_DESC]);
    return $semua->all();
  }

  public function get_tabel_all($tabel, $where = false)
  {
    $semua = new Query;
    $semua->from($tabel);
    if ($where) {
      $semua->where($where);
    }
    return $semua->all();
  }

  public function get_tabel_by($tabel, $where = false, $keranjang = false)
  {
    $semua = new Query;
    $semua->from($tabel);
    if ($where) {
      $semua->where($where);
    }
    if ($keranjang) {
      $id = $where['produk_id'];
      $cart = Yii::$app->cart;
      // if ($id) {
        $model = ProdukForm::findOne([
          'produk_id' => $where['produk_id'],
        ]);
        // $model = Produk::findOne($where);
        if ($model) {
            $cart->put($model, 1);
            return $semua->one();
            // return $this->redirect(['cart-view']);
        }
        throw new NotFoundHttpException();
      // }
    }
    return $semua->one();
  }

  public function simpan_produk($model, $produk, $kategori)
  {
    $created_by  = Yii::$app->user->identity->id;
    $gambar      = UploadedFile::getInstance($model, 'gambar');
    $nama_format = strtolower($produk['nama_produk'].' '.date('Y-m-d H-s-i'));
    $nama_format = str_replace(" ", "-", $nama_format).'.'.$gambar->extension;
    $gambar->saveAs(Yii::getAlias('@uploads').'/'.$nama_format);
    $nama_produk = strtolower($produk['nama_produk']);
    $nama_produk = ucwords($nama_produk);
    $model->nama_produk   = $nama_produk;
    $model->qty           = $produk['qty'];
    $model->kategori_id   = $kategori['nama_kategori'];
    $model->gambar        = $nama_format;
    $model->created_by    = $created_by;
    return $model->save();
  }

  public function simpan_kategori($model, $kategori)
  {
    $created_by  = Yii::$app->user->identity->id;
    $nama_kategori = strtolower($kategori['nama_kategori']);
    $nama_kategori = ucwords($nama_kategori);
    $model->nama_kategori = $nama_kategori;
    $model->created_by    = $created_by;
    return $model->save();
  }

  public function simpan_keranjang($model, $keranjang)
  {
    $created_by         = Yii::$app->user->identity->id;
    $model->produk_id   = (string)$keranjang['produk_id'];
    $model->harga       = $keranjang['harga'];
    $model->qty         = 1;
    $model->created_by  = $created_by;
    $model->save();
    return $model->keranjang_id;
  }

  public function update_keranjang($keranjang, $produk, $is_keranjang)
  {
    $update = Keranjang::findOne([
      'keranjang_id' => $keranjang['keranjang_id'],
      'is_selected'  => '0',
    ]);
    $qty           = (($is_keranjang) ? (int)($keranjang['qty']+1) : (int)($keranjang['qty']-1));
    // $harga         = (int)($qty*$produk['harga']);
    $update->qty   = $qty;
    // $update->harga = (string)$harga;
    if ($qty == 0) {
      return $update->delete();
    } else {
      return $update->save();
    }
  }

  public function update_sistem_pembayaran($pembayaran)
  {
    return Keranjang::updateAll(['pembayaran_id' => $pembayaran], [
      'created_by'   => Yii::$app->user->identity->id,
      'is_selected'  => '0',
    ]);
    // $update = Keranjang::find([
    //   'created_by'   => Yii::$app->user->identity->id,
    //   'is_selected'  => '0',
    // ]);
    // print_r($update);
    // exit;
    // $update->pembayaran_id = $pembayaran;
    // return $update->save();
  }

  public function ubah_produk($model, $produk, $kategori)
  {
    $created_by  = Yii::$app->user->identity->id;
    $gambar      = UploadedFile::getInstance($model, 'gambar');
    $update = Produk::findOne([
      'produk_id' => $produk['produk_id'],
    ]);
    if ($gambar) {
      $gambar         = UploadedFile::getInstance($model, 'gambar');
      $nama_format    = strtolower($produk['nama_produk'].' '.date('Y-m-d H-s-i'));
      $nama_format    = str_replace(" ", "-", $nama_format).'.'.$gambar->extension;
      $gambar->saveAs(Yii::getAlias('@uploads').'/'.$nama_format);
      $update->gambar = $nama_format;
    }
    $nama_produk = strtolower($produk['nama_produk']);
    $nama_produk = ucwords($nama_produk);
    $update->nama_produk   = $nama_produk;
    $update->qty           = $produk['qty'];
    $update->kategori_id   = $kategori['nama_kategori'];
    return $update->save();
  }

  public function ubah_kategori($kategori)
  {
    $update = KategoriForm::findOne([
      'kategori_id' => $kategori['kategori_id'],
    ]);
    $nama_kategori = strtolower($kategori['nama_kategori']);
    $nama_kategori = ucwords($nama_kategori);
    $update->nama_kategori = $nama_kategori;
    return $update->save();
  }

  public function delete_produk($produk_id)
  {
    $update = ProdukForm::findOne([
      'produk_id' => $produk_id,
    ]);
    $update->is_delete  = '0';
    return $update->save();
  }

  public function delete_kategori($kategori_id)
  {
    $update = KategoriForm::findOne([
      'kategori_id' => $kategori_id,
    ]);
    $update->is_delete  = '0';
    return $update->save();
  }

  public function is_selected_keranjang($kategori)
  {
    $update = KategoriForm::findOne([
      'kategori_id' => $kategori['kategori_id'],
    ]);
    $nama_kategori = strtolower($kategori['nama_kategori']);
    $nama_kategori = ucwords($nama_kategori);
    $update->nama_kategori = $nama_kategori;
    return $update->save();
  }

  public function simpan_transaksi($model, $keranjang, $data)
  {
    $created_by              = Yii::$app->user->identity->id;
    $model->kode_transaksi   = (string)$data['order_id'];
    $model->harga_produk     = (string)$keranjang['harga_produk'];
    $model->status_transaksi = ($keranjang['pembayaran_id'] == '1') ? '2' : '1';
    $model->ongkir           = '10000';
    $model->created_by       = $created_by;
    $model->save();
    return $model->transaksi_id;
  }

  public function simpan_tagihan($model, $keranjang, $data, $transaksi_id)
  {
    $created_by = Yii::$app->user->identity->id;
    $update     = Keranjang::updateAll(['transaksi_id' => $transaksi_id, 'is_selected' => '1'], [
      'created_by'  => Yii::$app->user->identity->id,
      'is_selected' => '0',
    ]);

    $model->transaksi_id     = $transaksi_id;
    $model->kode_tagihan     = (string)$data['fp_merchant_ref'];
    $model->status_tagihan   = ($keranjang['pembayaran_id'] == '1') ? '2' : '1';
    $model->total_bayar      = (string)($keranjang['harga_produk']+10000);
    $model->created_by       = $created_by;
    return $model->save();
  }

  public function delete_keranjang($keranjang_id)
  {
    $update = Keranjang::findOne([
      'keranjang_id' => $keranjang_id,
    ]);
    return $update->delete();
  }

  public function api_xml()
  {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
    // $myXMLData = xml version='1.0' encoding='UTF-8';
    $myXMLData = "<?xml version='1.0' encoding='UTF-8'?>
                    <fasa_request id='1234567'>
                        <auth>
                            <api_key>c9524af355f830798b295af60a82dcb5</api_key>
                            <token>fba13252ebe83b280d2a7963a2a1a2049b9ef1713d00223d308cb8f98afc776d</token>
                        </auth>
                        <history>
                        </history>
                    </fasa_request>
                  ";
    $xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
    $url = "https://sandbox.fasapay.com/xml/";
    $handler = curl_init();
    // set URL and other appropriate options
    curl_setopt($handler, CURLOPT_URL, $url);
    curl_setopt($handler, CURLOPT_HEADER, false);
    // print_r($xml);
    // exit;
    curl_setopt($handler, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($handler, 115, 1);

    // Sending request through post
    curl_setopt($handler, CURLOPT_POST, true);
    curl_setopt($handler, CURLOPT_POSTFIELDS, 'req='.urlencode($xml));
    // Some optimization :)
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    $content = curl_exec($handler);
    curl_close($handler);
    print_r($content);
    exit;
    return $content;
  }

}
