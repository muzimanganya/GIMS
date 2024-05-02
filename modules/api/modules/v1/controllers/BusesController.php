<?php

namespace app\modules\api\modules\v1\controllers;

use app\modules\api\modules\v1\models\Card;
use yii\rest\Controller;

class BusesController extends Controller
{
    public function actionAll()
    {
        return Card::find()->asArray()->all();
    }
}
