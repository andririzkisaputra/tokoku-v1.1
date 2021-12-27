<?php

namespace frontend\controllers;

use Yii;
use common\models\Api;
use app\models\Keranjang;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Url;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;
use yz\shoppingcart\ShoppingCart;

/**
 * Site controller
 */
class ApiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionRekomendasiProduk()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$searchValue     = '';
      // $where_like 		 = array(
			// 	'produk.nama_produk'   => $searchValue,
			// 	'produk.nama_kategori' => $searchValue,
			// );
      $where      = ['=', 'produk.is_delete' , '1'];
      $modelApi = new Api();
			$query		= $modelApi->get_join_tabel($where, false, 9, 0, 'produk.updated_at', 'produk', 'kategori', 'kategori.kategori_id = produk.kategori_id');
			foreach ($query as $key => $value) {
				$query[$key]['no']	      = $key+1;
				$query[$key]['harga_f']	  = "Rp ".number_format($value['harga'],0,',','.');
        $query[$key]['keranjang'] = $modelApi->get_tabel_by('keranjang', ['produk_id' => $value['produk_id'], 'is_selected' => '0', 'created_by' => Yii::$app->user->identity->id]);
			}

      $result['data'] = $query;
      return $result;
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionListProduk()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			$searchValue     = '';
      $where      = ['=', 'produk.is_delete' , '1'];
      $modelApi = new Api();
			$query		= $modelApi->get_join_tabel($where, false, false, false, 'produk.updated_at', 'produk', 'kategori', 'kategori.kategori_id = produk.kategori_id');
			foreach ($query as $key => $value) {
				$query[$key]['no']	      = $key+1;
				$query[$key]['harga_f']	  = "Rp ".number_format($value['harga'],0,',','.');
        $query[$key]['keranjang'] = $modelApi->get_tabel_by('keranjang', ['produk_id' => $value['produk_id'], 'is_selected' => '0', 'created_by' => Yii::$app->user->identity->id]);
			}

      $result['data'] = $query;
      return $result;
    }

    /**
     * Select Keranjang action.
     *
     * @return string|Response
     */
    public function actionSelectKeranjang()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi  = new Api();
      $model     = new Keranjang();
      $keranjang = $modelApi->get_tabel_by('keranjang', ['produk_id' => $_POST['produk_id'], 'is_selected' => '0']);
      if (!$keranjang) {
        $query = $modelApi->get_tabel_by('produk', ['produk_id' => $_POST['produk_id']], true);
        $data  = $modelApi->simpan_keranjang($model, $query);
      }
      $result['data'] = ($keranjang) ? $keranjang['keranjang_id'] : $data;
      return $result;
    }

    /**
     * Select Keranjang action.
     *
     * @return string|Response
     */
    public function actionSelectPembayaran()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $model    = new Keranjang();
      $data     = $modelApi->update_sistem_pembayaran($_POST['pembayaran']);
      $result['data'] = $data;
      return $result;
    }

    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionKeranjang()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $model    = new Keranjang();
      $queryKeranjang	= $modelApi->get_tabel_by('keranjang', ['keranjang_id' => $_POST['keranjang_id']]);
      $query = $modelApi->get_tabel_by('produk', ['produk_id' => $queryKeranjang['produk_id']], true);
      $data  = $modelApi->update_keranjang($queryKeranjang, $query, $_POST['is_keranjang']);

      $result['data'] = $data;
      return $result;
    }

    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionGetKeranjang()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $query = $modelApi->get_join_tabel(
        [
          'keranjang.created_by' => Yii::$app->user->identity->id,
          'is_selected'          => '0'
        ],
        false, false, false, 'keranjang.created_at', 'keranjang', 'produk', 'keranjang.produk_id = produk.produk_id',
        'keranjang.*, produk.nama_produk, produk.gambar'
      );

      foreach ($query as $key => $value) {
				$query[$key]['harga_f']	  = "Rp ".number_format($value['harga'],0,',','.');
				// $query[$key]['gambar_f']  = Url::base().'/backend/web/uploads/'.$value['gambar'];
			}
      $result['data'] = $query;
      return $result;
    }

    /**
     * Pesanan action.
     *
     * @return string|Response
     */
    public function actionGetPesanan()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $query = $modelApi->get_join_tabel(
        [
          'keranjang.created_by' => Yii::$app->user->identity->id,
          'is_selected'          => '0'
        ],
        false, false, false, 'keranjang.created_at', 'keranjang', 'produk', 'keranjang.produk_id = produk.produk_id',
        'keranjang.*, produk.nama_produk, produk.gambar'
      );

      foreach ($query as $key => $value) {
				$query[$key]['harga_f']	  = "Rp ".number_format($value['harga'],0,',','.');
			}
      $result['data'] = $query;
      return $result;
    }

    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionGetTransaksi()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $harga = 0;
      $total = 0;
      $qty   = 0;
      $modelApi = new Api();
      $query = $modelApi->get_join_tabel(
        [
          'keranjang.created_by' => Yii::$app->user->identity->id,
          'is_selected'          => '0',
          // 'keranjang_id'         => $_POST['nomor']
        ],
        false, false, false, 'keranjang.created_at', 'keranjang', 'produk', 'keranjang.produk_id = produk.produk_id',
        'keranjang.*, produk.nama_produk, produk.gambar, pembayaran.pembayaran, pembayaran.admin', 'pembayaran', 'pembayaran.pembayaran_id = keranjang.pembayaran_id'
      );

      foreach ($query as $key => $value) {
				$query[$key]['harga_f']	  = "Rp ".number_format($value['harga'],0,',','.');
        // $harga                    = $value['harga'];
        $harga                    = $harga+($value['qty']*$value['harga']);
        $qty                      = $value['qty']+$qty;
        $admin                    = $value['admin'];
        $keranjang_id             = $value['keranjang_id'];
        // $total                    = $total+($harga+$admin);
			}
      $ongkir = 10000;
      $total  = $total+$harga+$ongkir;
      $result['fasapay_data'] = [
        'fp_acc'          => 'FPX4593',
        'fp_item'         => $qty.' produk',
        'fp_comments'     => 'Pembelian '.$qty.' produk',
        'track_id'        => $keranjang_id,
        'order_id'        => 'TKU'.rand(10000, 99999),
        'fp_merchant_ref' => 'TKO'.rand(10000, 99999),
        // 'fp_success_url'  => 'http://192.168.9.98/tokoku/frontend/web/site/keranjang',
        // 'fp_fail_url'     => 'http://192.168.9.98/tokoku/frontend/web/',
        // 'fp_status_url'   => 'http://192.168.9.98/tokoku/frontend/web/',
        // 'fp_success_url'  => 'http://192.168.100.4/tokoku/frontend/web/site/success?transaksi='.json_encode($query, JSON_FORCE_OBJECT),
        // 'fp_fail_url'     => 'http://192.168.100.4/tokoku/frontend/web/',
        // 'fp_status_url'   => 'http://192.168.100.4/tokoku/frontend/web/',
        'fp_amnt'         => $total,
      ];
      $result['rincian'] = [
        'harga'         => $harga,
        'biaya_admin'   => $admin,
        'kode_unik'     => 0,
        'onkir'         => $ongkir,
        'total'         => $total,
      ];
      $result['rincian_f'] = [
        'harga_f'       => "Rp ".number_format($harga,0,',','.'),
        'biaya_admin_f' => ($admin) ? "Rp ".number_format($admin,0,',','.') : 'Rp -',
        'kode_unik_f'   => "Rp -",
        'onkir_f'       => "Rp ".number_format($ongkir,0,',','.'),
        'total_f'       => "Rp ".number_format($total,0,',','.')
      ];
      $result['fp_success_url'] = 'http://192.168.9.98/e-commerce/frontend/web/site/success?track_id='.$keranjang_id.'&order_id='.$result['fasapay_data']['order_id'].'&fp_merchant_ref='.$result['fasapay_data']['fp_merchant_ref'];
      $result['fp_fail_url']    = 'http://192.168.9.98/e-commerce/frontend/web/';
      $result['fp_status_url']  = 'http://192.168.9.98/e-commerce/frontend/web/';
      $result['data'] = $query;
      return $result;
    }

    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionDeleteKeranjang()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $query = $modelApi->delete_keranjang($_POST['keranjang_id']);

      $result['data'] = $query;
      return $result;
    }

    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionSuccess()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      print_r($_GET['transaksi']);
      // $modelApi = new Api();
      // $query = $modelApi->delete_keranjang($_POST['keranjang_id']);
      //
      // $result['data'] = $query;
      // return $result;
    }

    /**
     * Pembayaran action.
     *
     * @return string|Response
     */
    public function actionPembayaran()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $data     = $modelApi->get_tabel_all('pembayaran', ['=', 'is_active', '1']);
      $result['data'] = $data;
      return $result;
    }

    /**
     * TestApi action.
     *
     * @return string|Response
     */
    public function actionTestApi()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $data     = $modelApi->api_xml();
      $result['data'] = $data;
      return $result;
    }

}
