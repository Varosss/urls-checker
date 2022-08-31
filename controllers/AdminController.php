<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Urls;
use app\models\Checks;

class AdminController extends Controller
{
    public function actionIndex()
    {
        $urls = Urls::find()->all();
        $checks = Checks::find()->all();

        return $this->render('index', ['urls' => $urls, 'checks' => $checks]);
    }

    /**
    *   @param string
    *   @param int
    */

    public function actionView($key, $id)
    {   
        if ($key == "urls") {
            $model = Urls::findOne($id);
        }

        if ($key == 'checks') {
            $model = Checks::findOne($id);
        }

        return $this->render('view', ['key' => $key, 'model' => $model, 'id' => $id]);
    }

    private function actionCheck($id)
    {
        $check_model = new Checks;

        $url_model = Urls::findOne($id);
        $url = $url_model->address;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

        curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $check_model->url = $url;
        $check_model->code = $httpcode;
        $check_model->attempt = $url_model->attempt;
        $check_model->check_date = date('Y-m-d H:i:s');

        $check_model->save();

        if ($httpcode < 400 || $url_model->attempt > $url_model->error_check) {
            $url_model->attempt = 1;
            $url_model->timestamp = time() + $url_model->check_frequency*60;
        }

        if ($httpcode >= 400 || $httpcode == 0) {
            $url_model->attempt += 1;
            $url_model->timestamp = time() + 60;
        }

        $url_model->save();

        echo time() . "<br>";
    }

    public function actionRunChecking() {
        $models = Urls::find()->orderBy("timestamp")->all();

        foreach ($models as $model) {
            if ($model->timestamp <= time()) {
                $this->actionCheck($model->id);
            }
        }
    }
}