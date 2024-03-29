<?php

namespace common\models;

use Yii;
use yii\base\Model;
use app\models\Produk;
// use backend\models\Produk;
use app\models\Keranjang;
use app\models\Tagihan;
use app\models\Transaksi;
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

  public function get_join_loop(
    $where      = false,
    $where_like = false,
    $limit      = false,
    $start      = false,
    $order_by,
    $tabel,
    $tabel_join,
    $select     = '*',
    $group_by   = false
  ) {
    $semua = new Query;
    $semua->select($select);
    $semua->from($tabel);
    foreach ($tabel_join as $key => $value) {
      $semua->leftJoin($value['tabel'], $value['where']);
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
    if ($group_by) {
      $semua->groupBy($group_by);
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
    $update      = Produk::findOne([
      'produk_id' => $produk['produk_id'],
    ]);
    if ($gambar) {
      // $gambar         = UploadedFile::getInstance($model, 'gambar');
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
    $update = Produk::findOne([
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

  public function simpan_transaksi($model, $keranjang, $data, $url)
  {
    $created_by              = Yii::$app->user->identity->id;
    $model->kode_transaksi   = (string)$data['order_id'];
    $model->harga_produk     = (string)$keranjang['harga_produk'];
    $model->status_transaksi = '1';
    $model->ongkir           = '0';
    if ($data['pembayaran_id'] == '1') {
      $model->url_bayar      = $url;
    } elseif ($data['pembayaran_id'] == '3') {
      $model->qr_code        = $url;
    } elseif ($data['pembayaran_id'] == '4') {
      $model->url_bayar      = $url->fp_va_howto_link;
      $model->url_bayar      = $url->fp_va_howto_link;
    }
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
    
    $model->bukti_bayar      = 'belum ada gambar';
    $model->transaksi_id     = (int)$transaksi_id;
    $model->kode_tagihan     = (string)$data['fp_merchant_ref'];
    $model->status_tagihan   = '1';
    $model->total_bayar      = (string)($keranjang['harga_produk']+0);
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

  public function fasapay($post)
  {
    // $str = "OtomaX|" + memberId + "|" + product + "|" + dest + "|" +
    // refID + "|" + pin
    // + "|" + password
    // $sign should be "vlrN9Yuu4xHAT8_bXIUHKw2NjHo"
    // $sign = str_replace('/', '_', str_replace('+', '-' , rtrim(base64_encode(sha1('FASA001|251116|6>8^^XyhG)M', true)), '=')));
    // $sign = str_replace('/', '_', str_replace('+', '-' , rtrim(base64_encode(sha1('VEM001|1234|2sw123d', true)), '=')));
    // print_r($sign);
    // exit;
    $data['fp_sci_version']  = 3;
    $data['fp_acc']          = $post['fp_acc'];
    $data['fp_acc_from']     = '';
    $data['fp_amnt']         = $post['fp_amnt'];
    $data['fp_comments']     = $post['fp_comments'];
    $data['fp_currency']     = 'IDR';
    $data['fp_expire_at']    = strtotime('+3 day');
    $data['fp_item']         = $post['fp_item'];
    $data['fp_merchant_ref'] = $post['fp_merchant_ref'];
    if ($post['pembayaran_id'] == '1') {
      $data['fp_payment_mode'] = 'WALLET';
    } elseif ($post['pembayaran_id'] == '3') {
      $data['fp_payment_mode'] = 'QRIS';
    } elseif ($post['pembayaran_id'] == '4') {
      $data['fp_payment_mode'] = 'VA';
    }
    
    $data['fp_store']         = 'tokoku';
    $data['fp_store_link']    = '';
    $data['time_window']      = floor(time()/30);
    $string                   = implode("|",$data);
    $data['fp_request_hmac']  = hash_hmac('sha256', $string, '123456');
    $data['fp_cust_name']     = Yii::$app->user->identity->nama;
    $data['fp_status_url']    = 'https://integration-demo.fasapay.id/site/keranjang';
    $data['fp_status_method'] = 'GET';
    $data['track_id']         = $post['track_id'];
    $data['order_id']         = $post['order_id'];
    $data['fp_sci_link']      = 'true';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
      "Content-Type: application/json",
      )
    );
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_URL, 'https://sci.dev.fasapay.id/');
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($curl);
    curl_close($curl);
    // print_r($result);
    // exit;
    return json_decode($result);
  }

  public function status_transaksi($value)
  {
    $data = [
      1 => 'Menunggu Pembayaran',
      2 => 'Menunggu Konfirmasi Pembayaran',
      3 => 'Dibayar',
      4 => 'Batal',
      5 => 'Gagal',
      6 => 'Dikirim',
      7 => 'Selesai',
    ];
    return $data[$value];
  }

  public function status_tagihan($value)
  {
    $data = [
      1 => 'Menunggu Pembayaran',
      2 => 'Menunggu Konfirmasi', 
      3 => 'Dibayar',
      4 => 'Batal', 
      5 => 'Gagal'
    ];
    $colors = [
      1 => 'btn btn-info btn-sm',
      2 => 'btn btn-info btn-sm', 
      3 => 'btn btn-success btn-sm',
      4 => 'btn btn-danger btn-sm', 
      5 => 'btn btn-danger btn-sm'
    ];
    $result['data'] =  $data[$value];
    $result['colors'] =  $colors[$value];
    return $result;
  }

  public function kirim_bukti_bayar($model, $post)
  {
    $modelTagihan = new Tagihan();
    $bukti_bayar  = UploadedFile::getInstance($model, 'bukti_bayar');
    $created_by   = Yii::$app->user->identity->id;
    $update       = Tagihan::findOne([
      'kode_tagihan'   => $post['kode_tagihan'],
      'status_tagihan' => '1',
      'created_by'     => $created_by
    ]);
    $transaksi     = Transaksi::findOne([
      'transaksi_id'     => $update->transaksi_id,
      'status_transaksi' => '1',
      'created_by'       => $created_by
    ]);
    $transaksi->status_transaksi = '2';
    $transaksi->save();
    $nama_format    = $post['kode_tagihan'].' '.date('Y-m-d H-s-i');
    $nama_format    = str_replace(" ", "-", $nama_format).'.'.$bukti_bayar->extension;;
    $bukti_bayar->saveAs(Yii::getAlias('@uploadsBuktiBayar').'/'.$nama_format);
    $update->status_tagihan = '2';
    $update->bukti_bayar    = $nama_format;
    return $update->save();
  }

}
