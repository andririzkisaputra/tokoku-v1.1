<?php

namespace backend\controllers;

use Yii;
use common\models\Api;
use common\models\ProdukForm;
use common\models\KategoriForm;
use app\models\Produk;
use app\models\Kategori;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Url;

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
    public function actionGetProduk()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $draw       		 = $_POST['draw'];
			$start      		 = $_POST['start'];
			$rowperpage 		 = $_POST['length'];
			$columnIndex  	 = $_POST['order'][0]['column'];
			$columnName   	 = $_POST['columns'][$columnIndex]['data'];
			$columnSortOrder = $_POST['order'][0]['dir'];
			$searchValue     = $_POST['search']['value'];
      $where_like 		 = array(
				'produk.nama_produk'   => $searchValue,
				'produk.nama_kategoti' => $searchValue,
			);
      $where_like = ['like', 'nama_produk' , $where_like];
      $where      = ['=', 'produk.is_delete' , '1'];
      $modelApi   = new Api();
      $query		  = $modelApi->get_join_tabel($where, $where_like, $rowperpage, $start, 'produk.updated_at', 'produk', 'kategori', 'kategori.kategori_id = produk.kategori_id');
			foreach ($query as $key => $value) {
				$query[$key]['no']	 = $key+1;
				$query[$key]['aksi'] = '<div class="btn-group btn-group-toggle">'
                                 .Html::button('Detail', ['value' => Url::to(['/site/detail-produk?id='.$value['produk_id']]), 'class' => 'btn btn-sm btn-info showModalButton'])
                                 .Html::button('Ubah', ['value' => Url::to(['/site/ubah-data-produk?id='.$value['produk_id']]), 'class' => 'btn btn-sm btn-success showModalButton'])
                                 .Html::button('Hapus', ['value' => Url::to(['javascript:void(0)']), 'class' => 'btn btn-sm btn-danger hapus', 'data' => $value['produk_id']])
      												 .'</div>';
			}

      $result['draw'] 					 = $draw;
			$result['recordsFiltered'] = count($modelApi->get_join_tabel($where, $where_like, false, false, 'produk.updated_at', 'produk', 'kategori', 'kategori.kategori_id = produk.kategori_id'));
      $result['recordsTotal']    = count($query);
			$result['data'] 					 = $query;
      return $result;
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionGetPesanan()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $draw       		 = $_POST['draw'];
			$start      		 = $_POST['start'];
			$rowperpage 		 = $_POST['length'];
			$columnIndex  	 = $_POST['order'][0]['column'];
			$columnName   	 = $_POST['columns'][$columnIndex]['data'];
			$columnSortOrder = $_POST['order'][0]['dir'];
			$searchValue     = $_POST['search']['value'];
      // $where_like 		 = [
      //   'tagihan.kode_tagihan'   => $searchValue,
			// 	'tagihan.jumlah'         => $searchValue,
      // ];
      $tabel_join = [
        ['tabel' => 'transaksi', 'where' => 'transaksi.transaksi_id = tagihan.transaksi_id'],
        ['tabel' => 'keranjang', 'where' => 'keranjang.transaksi_id = transaksi.transaksi_id'],
        ['tabel' => 'produk', 'where' => 'produk.produk_id = keranjang.produk_id'],
      ];
      $where_like = ['like', 'tagihan.kode_tagihan', $searchValue];
      // $where      = ['=', 'produk.is_delete' , '1'];
      $modelApi   = new Api();
      $query		  = $modelApi->get_join_loop(false, $where_like, $rowperpage, $start, 'tagihan.updated_at', 'tagihan', $tabel_join, '*, COUNT(transaksi.transaksi_id) as jumlah', 'tagihan.transaksi_id');
			foreach ($query as $key => $value) {
        $data                             = $modelApi->status_tagihan($value['status_tagihan']);
				$query[$key]['no']	              = $key+1;
				$query[$key]['status_tagihan_f']	= '<span class="'.$data['colors'].'">'.$data['data'].'</span>';
        if ($value['status_transaksi'] == '1') {
          $query[$key]['aksi'] = '<div class="btn-group btn-group-toggle">'
                                    .Html::button('Detail', ['value' => Url::to(['/site/detail-pesanan?id='.$value['transaksi_id']]), 'class' => 'btn btn-sm btn-success showModalButton'])
                                    .Html::button('Batalkan Pesanan', ['value' => Url::to(['javascript:void(0)']), 'class' => 'btn btn-sm btn-danger hapus', 'data' => $value['produk_id']])
                                 .'</div>';
        } elseif ($value['status_transaksi'] == '2') {
          $query[$key]['aksi'] = '<div class="btn-group btn-group-toggle">'
                                    .Html::button('Bukti Bayar', ['value' => Url::to(['/site/bukti-bayar-pesanan?id='.$value['transaksi_id']]), 'class' => 'btn btn-sm btn-info showModalButton'])
                                    .Html::button('Terima Pesanan', ['value' => Url::to(['/site/detail-pesanan?id='.$value['transaksi_id']]), 'class' => 'btn btn-sm btn-success showModalButton'])
                                    .Html::button('Detail', ['value' => Url::to(['/site/detail-pesanan?id='.$value['transaksi_id']]), 'class' => 'btn btn-sm btn-info showModalButton'])
                                    .Html::button('Batalkan Pesanan', ['value' => Url::to(['javascript:void(0)']), 'class' => 'btn btn-sm btn-danger hapus', 'data' => $value['produk_id']])
                                 .'</div>';
        }
			}

      $result['draw'] 					 = $draw;
			$result['recordsFiltered'] = count($modelApi->get_join_loop(false, $where_like, false, false, 'tagihan.updated_at', 'tagihan', $tabel_join, '*', 'tagihan.transaksi_id'));
      $result['recordsTotal']    = count($query);
			$result['data'] 					 = $query;
      return $result;
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionGetKategori()
    {

      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $draw       		 = $_POST['draw'];
			$start      		 = $_POST['start'];
			$rowperpage 		 = $_POST['length'];
			$columnIndex  	 = $_POST['order'][0]['column'];
			$columnName   	 = $_POST['columns'][$columnIndex]['data'];
			$columnSortOrder = $_POST['order'][0]['dir'];
			$searchValue     = $_POST['search']['value'];
      $where_like 		 = array(
				'nama_kategori'   => $searchValue,
			);
      $where_like = ['like', 'nama_kategori' , $where_like];
      $where      = ['=', 'is_delete' , '1'];
      $modelApi = new Api();
			$query		= $modelApi->get_tabel($where, $where_like, $rowperpage, $start, 'updated_at', 'kategori');
			foreach ($query as $key => $value) {
				$query[$key]['updated_at_f']	 = date('d M Y H:i:s', $value['updated_at']);
				$query[$key]['no']	 = $key+1;
				$query[$key]['aksi'] = '<div class="btn-group btn-group-toggle">'
                                 .Html::button('Ubah', ['value' => Url::to(['/site/ubah-data-kategori?id='.$value['kategori_id']]), 'class' => 'btn btn-sm btn-success showModalButton'])
                                 .Html::button('Hapus', ['value' => Url::to(['javascript:void(0)']), 'class' => 'btn btn-sm btn-danger hapus', 'data' => $value['kategori_id']])
      												 .'</div>';
			}
      $result['draw'] 					 = $draw;
			$result['recordsFiltered'] = count($modelApi->get_tabel($where, $where_like, false, false, 'updated_at', 'kategori'));
      $result['recordsTotal']    = count($query);
			$result['data'] 					 = $query;
			return $result;
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionPostProduk()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $simpan        = false;
      $modelApi      = new Api();
      $modelProduk   = new Produk();
      $modelKategori = new Kategori();

      if(Yii::$app->request->isAjax && $modelProduk->load(Yii::$app->request->post()) && $modelKategori->load(Yii::$app->request->post()))
      {
        $produk   = Yii::$app->request->post('Produk');
        $kategori = Yii::$app->request->post('Kategori');
        $simpan = $modelApi->simpan_produk($modelProduk, $produk, $kategori);
      }
			return ($simpan) ? true : false;
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionPostKategori()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $simpan        = false;
      $modelApi      = new Api();
      $modelKategori = new Kategori();
      if(Yii::$app->request->isAjax && $modelKategori->load(Yii::$app->request->post()))
      {
        $kategori = Yii::$app->request->post('Kategori');
        $simpan = $modelApi->simpan_kategori($modelKategori, $kategori);
      }
			return $simpan;
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionUbahProduk()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi      = new Api();
      $modelProduk   = new Produk();
      $modelKategori = new Kategori();
      if(Yii::$app->request->isAjax && $modelProduk->load(Yii::$app->request->post()) && $modelKategori->load(Yii::$app->request->post()))
      {
        $produk   = Yii::$app->request->post('Produk');
        $kategori = Yii::$app->request->post('Kategori');
        $simpan = $modelApi->ubah_produk($modelProduk, $produk, $kategori);
      }
			return (isset($simpan)) ? true : false;
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionUbahKategori()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi      = new Api();
      $modelKategori = new Kategori();
      $simpan        = false;
      if(Yii::$app->request->isAjax && $modelKategori->load(Yii::$app->request->post()))
      {
        $kategori = Yii::$app->request->post('Kategori');
        $simpan = $modelApi->ubah_kategori($kategori);
      }
			return $simpan;
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionDeleteProduk()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi  = new Api();
      $produk_id = Yii::$app->request->post('produk_id');
      $hapus     = $modelApi->delete_produk($produk_id);
      
			return $hapus;
    }
    
    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionDetailPesanan()
    {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $modelApi = new Api();
      $tabel_join = [
        ['tabel' => 'transaksi', 'where' => 'transaksi.transaksi_id = keranjang.transaksi_id'],
        ['tabel' => 'tagihan',   'where' => 'tagihan.transaksi_id   = transaksi.transaksi_id'],
        ['tabel' => 'produk',    'where' => 'produk.produk_id       = keranjang.produk_id'],
      ];
      $where          = ['=', 'tagihan.transaksi_id', $_POST['id']];
      $query          = $modelApi->get_join_loop($where, false, false, false, 'keranjang.updated_at', 'keranjang', $tabel_join);
      $result['data'] = $query;
      return $result;
    }

}
