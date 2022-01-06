<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Api;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Transaksi;
use app\models\Tagihan;
use Da\QrCode\QrCode;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('home/index');
        } else {
          $this->redirect('@web/site/login');
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionNotifikasi()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('notifikasi/index');
        } else {
          $this->redirect('@web/site/login');
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionKeranjang()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('keranjang/index');
        } else {
          $this->redirect('@web/site/login');
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionPesanan()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('pesanan/index');
        } else {
          $this->redirect('@web/site/login');
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionProduk()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('produk/index');
        } else {
          $this->redirect('@web/site/login');
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

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
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionTransaksi()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('transaksi/index');
        } else {
            $this->redirect('@web/site/login');
        }
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    /**
     * Displays produk.
     *
     * @return string
     */
     public function actionPembayaran() {
       $modelApi = new Api();
       return $this->renderAjax('transaksi/pembayaran', [
         'id' => '1'
       ]);
     }


     /**
      * Keranjang action.
      *
      * @return string|Response
      */
     public function actionSuccess()
     {
       $modelApi       = new Api();
       $modelTransaksi = new Transaksi();
       $modelTagihan   = new Tagihan();
       if (Yii::$app->user->identity->id) {
         $data = [
           'harga_produk' => 0
         ];
         $keranjang = $modelApi->get_tabel_all('keranjang', ['created_by' => Yii::$app->user->identity->id, 'is_selected' => '0']);
         foreach ($keranjang as $key => $value) {
           $data['pembayaran_id'] = $value['pembayaran_id'];
           $data['harga_produk']  = $data['harga_produk']+($value['harga']*$value['qty']);
         }
         $transaksi = $modelApi->simpan_transaksi($modelTransaksi, $data, $_GET);
         $tagihan   = $modelApi->simpan_tagihan($modelTagihan, $data, $_GET, $transaksi);
       }
       $this->redirect('@web/site/pesanan');
     }

    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionSciSecure()
    {
        // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $modelApi = new Api();
        $modelTransaksi = new Transaksi();
        $modelTagihan   = new Tagihan();
        $data = $modelApi->fasapay($_POST);
        if (isset($data->fp_sci_link)) {
            if (Yii::$app->user->identity->id) {
                $data_pembayaran = [
                    'harga_produk' => 0
                ];
                $keranjang = $modelApi->get_tabel_all('keranjang', ['created_by' => Yii::$app->user->identity->id, 'is_selected' => '0']);
                foreach ($keranjang as $key => $value) {
                    $data_pembayaran['pembayaran_id'] = $value['pembayaran_id'];
                    $data_pembayaran['harga_produk']  = $data_pembayaran['harga_produk']+($value['harga']*$value['qty']);
                }
                $transaksi = $modelApi->simpan_transaksi($modelTransaksi, $data_pembayaran, $_POST, $data->fp_sci_link);
                $tagihan   = $modelApi->simpan_tagihan($modelTagihan, $data_pembayaran, $_POST, $transaksi);
            }
            $this->redirect($data->fp_sci_link);
        } elseif (isset($data->fp_sci_qris)) {
            $nama_qr = 'qr-code-'.$data->fp_sci_randkey.'.png';
            $qrCode  = (new QrCode($data->fp_sci_qris))->setSize(250)->setMargin(5)->useForegroundColor(00, 000, 000);
            $qrCode->writeFile(Yii::getAlias('@uploadsQrCode').'/'.$nama_qr);
            if (Yii::$app->user->identity->id) {
                $data_pembayaran = [
                    'harga_produk' => 0
                ];
                $keranjang = $modelApi->get_tabel_all('keranjang', ['created_by' => Yii::$app->user->identity->id, 'is_selected' => '0']);
                foreach ($keranjang as $key => $value) {
                    $data_pembayaran['pembayaran_id'] = $value['pembayaran_id'];
                    $data_pembayaran['harga_produk']  = $data_pembayaran['harga_produk']+($value['harga']*$value['qty']);
                }
                $transaksi = $modelApi->simpan_transaksi($modelTransaksi, $data_pembayaran, $_POST, $nama_qr);
                $tagihan   = $modelApi->simpan_tagihan($modelTagihan, $data_pembayaran, $_POST, $transaksi);
            }
            $this->redirect('@web/site/pesanan');
        } 
    }


    /**
     * Keranjang action.
     *
     * @return string|Response
     */
    public function actionQrCode()
    {
        $modelApi = new Api();
        return $this->renderAjax('pesanan/detailQrCode', [
            'kode_transaksi' => $_GET['data']
        ]);
    }
}
