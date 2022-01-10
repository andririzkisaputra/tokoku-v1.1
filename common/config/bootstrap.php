<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@root', realpath(dirname(__FILE__).'/../../'));
Yii::setAlias('@uploads', dirname(dirname(__DIR__)) . '/uploads/backend/produk');
Yii::setAlias('@uploadsBuktiBayar', dirname(dirname(__DIR__)) . '/uploads/frontend/bukti_bayar');
Yii::setAlias('@uploadsQrCode', dirname(dirname(__DIR__)) . '/uploads/frontend/qr_code');
Yii::setAlias('@viewImgBackend', '/e-commerce/uploads/backend/produk');
