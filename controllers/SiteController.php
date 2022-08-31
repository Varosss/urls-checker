<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryUrlForm;
use app\models\Urls;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $model = new EntryUrlForm();
        $url_model = new Urls();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $url_model->address = $model->address;
            $url_model->check_frequency = $model->check_frequency;
            $url_model->error_check = $model->error_check;
            $url_model->creation_date = date('Y-m-d H:i:s');
            $url_model->timestamp = time() + $model->check_frequency*60;
            $url_model->attempt = 1;

            $url_model->save();

            return $this->render('index-confirm', ['model' => $model]);
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }
}