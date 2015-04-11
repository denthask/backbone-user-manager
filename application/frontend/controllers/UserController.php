<?php
namespace frontend\controllers;

use common\models\UsrAuth;
use yii\web\Controller;

class UserController extends Controller
{
    public $layout = 'user';

    public function actionIndex(){
        $model = new UsrAuth();
        return $this->render('index', ['model' => $model]);
    }
}