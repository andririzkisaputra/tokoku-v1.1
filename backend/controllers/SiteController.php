<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\ProdukForm;
use common\models\KategoriForm;
use app\models\Produk;
use app\models\Kategori;
use common\models\Api;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        // 'actions' => ['produk', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $produk = new Produk;
        // print_r($produk);
        // exit;
        return $this->render('index');
    }

    /**
     * Displays produk.
     *
     * @return string
     */
    public function actionProduk()
    {
        return $this->render('produk/index');
    }

    /**
     * Displays produk.
     *
     * @return string
     */
     public function actionTambahDataProduk() {
       $kategori      = [];
       $modelApi      = new Api();
       $modelProduk   = new Produk();
       $modelKategori = new Kategori();
       if ($modelProduk->load(Yii::$app->request->post()) && $modelKategori->load(Yii::$app->request->post())) {
         $this->redirect('@web/site/produk');
       } else {
         $dataKategori  = $modelApi->get_tabel_all('kategori', ['=', 'is_delete' , '1']);
         foreach ($dataKategori as $key => $value) {
           $kategori[$value['kategori_id']] = $value['nama_kategori'];
         }
         return $this->renderAjax('produk/tambahDataProduk', [
             'modelProduk'   => $modelProduk,
             'modelKategori' => $modelKategori,
             'kategori'      => $kategori,
         ]);
       }
     }

    /**
     * Displays produk.
     *
     * @return string
     */
     public function actionTambahDataKategori() {
       $model = new Kategori();
       if ($model->load(Yii::$app->request->post())) {
         $this->redirect('@web/site/kategori');
       } else {
         return $this->renderAjax('kategori/tambahDataKategori', [
             'model' => $model,
         ]);
       }
     }

    /**
     * Displays produk.
     * mba perlu di balas nggak ya terkait masalah VAnya yang di grop itu, tadi mba dona
     * @return string
     */
     public function actionDetailProduk($id) {
       $kategori      = [];
       $modelApi      = new Api();
       $dataProduk    = $modelApi->get_tabel_by('produk', ['=', 'produk_id', $id]);
       $dataKategori  = $modelApi->get_tabel_by('kategori', ['=', 'kategori_id', $dataProduk['kategori_id']]);
       $dataProduk['is_active'] = ($dataProduk['is_delete']) ? '<span class="btn btn-info btn-sm">Aktif</span>' : '<span class="btn btn-sm btn-danger">Delete</span>';
       $dataProduk['posting']   = date('d M Y H:i:s', $dataProduk['updated_at']);
       return $this->renderAjax('produk/detailProduk', [
           'kategori'      => $dataKategori,
           'produk'        => $dataProduk,
       ]);
     }

    /**
     * Displays produk.
     *
     * @return string
     */
     public function actionUbahDataProduk($id) {
       $kategori      = [];
       $modelApi      = new Api();
       $modelProduk   = new Produk();
       $dataProduk    = $modelApi->get_tabel_by('produk', ['=', 'produk_id', $id]);
       $modelKategori = new Kategori();
       $dataKategori  = $modelApi->get_tabel_all('kategori');
       foreach ($dataKategori as $key => $value) {
         $kategori[$value['kategori_id']] = $value['nama_kategori'];
       }
       return $this->renderAjax('produk/ubahDataProduk', [
           'modelProduk'   => $modelProduk,
           'modelKategori' => $modelKategori,
           'kategori'      => $kategori,
           'produk'        => $dataProduk,
       ]);
     }

    /**
     * Displays produk.
     *
     * @return string
     */
     public function actionUbahDataKategori($id) {
       $modelApi      = new Api();
       $modelKategori = new Kategori();
       $dataKategori  = $modelApi->get_tabel_by('kategori', ['=', 'kategori_id', $id]);
       return $this->renderAjax('kategori/ubahDataKategori', [
           'model'    => $modelKategori,
           'kategori' => $dataKategori,
       ]);
     }

    /**
     * Displays pesanan.
     *
     * @return string
     */
    public function actionPesanan()
    {
        $fasaHelper = new \common\components\FasaHelper();
        $accessToken = $fasaHelper->accessToken();

        $body = [
            "partnerReferenceNo" => "12345678912345678900", 
            "fasapayAccount" => "FI228004", 
            "balanceTypes" => [], 
            "additionalInfo" => [
                     "deviceId" => "4563219871", 
                     "channel" => "mobilephone" 
                  ] 
         ];
        $end_poin = '/snapv1/informasi-saldo';


        $signature = $fasaHelper->signatureService($body, $end_poin, $accessToken);
        $saldo = $fasaHelper->request($end_poin, $body, $signature, $accessToken);

        $body = [
            "partnerReferenceNo" => "12345678912345678900", 
            "fasapayAccount" => "FI228004", 
            "fromDateTime" => "2022-01-01 00:00:00", 
            "toDateTime" => "2022-12-16 00:00:00", 
            "pageSize" => "10", 
            "pageNumber" => "0", 
            "additionalInfo" => [
                  "deviceId" => "4563219871", 
                  "channel" => "mobilephone" 
               ] 
         ]; 
        $end_poin = '/snapv1/transaction-history-list';


        $signature = $fasaHelper->signatureService($body, $end_poin, $accessToken);
        $history_list = $fasaHelper->request($end_poin, $body, $signature, $accessToken);

        $body = [
            "partnerReferenceNo" => "12345678912345678900", 
            "fasapayAccount" => "FI228004", 
            "batchnumber" => "WD2210186617", 
            "additionalInfo" => [
                    "deviceId" => "4563219871", 
                    "channel" => "mobilephone" 
                ] 
        ];
        $end_poin = '/snapv1/transaction-history-detail';


        $signature = $fasaHelper->signatureService($body, $end_poin, $accessToken);
        $history_detail = $fasaHelper->request($end_poin, $body, $signature, $accessToken);
        return $this->render('pesanan/index', [
            'saldo' => $saldo
        ]);
    }

    /**
     * Displays pesanan.
     *
     * @return string
     */
    public function actionHistori()
    {
        $fasaHelper = new \common\components\FasaHelper();
        $accessToken = $fasaHelper->accessToken();

        $body = [
            "partnerReferenceNo" => "12345678912345678900", 
            "fasapayAccount" => "FI228004", 
            "balanceTypes" => [], 
            "additionalInfo" => [
                     "deviceId" => "4563219871", 
                     "channel" => "mobilephone" 
                  ] 
         ];
        $end_poin = '/snapv1/informasi-saldo';

        $signature = $fasaHelper->signatureService($body, $end_poin, $accessToken);
        $saldo = $fasaHelper->request($end_poin, $body, $signature, $accessToken);
        return $this->render('histori/index', [
            'saldo' => $saldo
        ]);
    }

    /**
     * Displays produk.
     * mba perlu di balas nggak ya terkait masalah VAnya yang di grop itu, tadi mba dona
     * @return string
     */
    public function actionDetailPesanan($id) {
        return $this->renderAjax('pesanan/detailPesanan', [
            'id' => $id
        ]);
    }

    /**
     * Displays laporan.
     *
     * @return string
     */
    public function actionLaporan()
    {
        return $this->render('laporan/index');
    }

    /**
     * Displays kategori.
     *
     * @return string
     */
    public function actionKategori()
    {
        return $this->render('kategori/index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionRegistrasi()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $post = Yii::$app->request->post();
        $modelApi = new Api();
        $simpan   = $modelApi->registrasi($post);
        return $simpan;
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays produk.
     * mba perlu di balas nggak ya terkait masalah VAnya yang di grop itu, tadi mba dona
     * @return string
     */
     public function actionDetailHistori($id) {
        $fasaHelper = new \common\components\FasaHelper();
        $accessToken = $fasaHelper->accessToken();
        $body = [
            "partnerReferenceNo" => "12345678912345678900", 
            "fasapayAccount" => "FI228004", 
            "batchnumber" => $id, 
            "additionalInfo" => [
                    "deviceId" => "4563219871", 
                    "channel" => "mobilephone" 
                ] 
        ];
        $end_poin = '/snapv1/transaction-history-detail';


        $signature = $fasaHelper->signatureService($body, $end_poin, $accessToken);
        $history_detail = $fasaHelper->request($end_poin, $body, $signature, $accessToken);
       return $this->renderAjax('histori/detailProduk', [
           'produk' => $history_detail,
       ]);
     }
}
