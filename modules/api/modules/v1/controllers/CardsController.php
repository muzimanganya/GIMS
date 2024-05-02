<?php

namespace app\modules\api\modules\v1\controllers;

use app\modules\api\modules\v1\models\Card;
use Yii;
use yii\rest\Controller;

class CardsController extends Controller
{
    public function actionCreate()
    {
        $post = Yii::$app->request->post();
        $success = [];

        $model = new Card($post);
        if ($model->save()) {
            $success['success'] = true;
            $success['message'] = Yii::t('app', 'Card was registred Successfully!');
            return $success;
        }

        Yii::error($model->errors);

        $success['success'] = false;
        $success['message'] = Yii::t('app', 'Card was not registered!');
        return $success;
    }

    public function actionAssign()
    {
        $post = Yii::$app->request->post();
        $success = [];

        $model = Card::find()->where(['id' => $post['card']])->one();
        if (empty($model)) {
            $success['success'] = false;
            $success['message'] = Yii::t('app', 'Card was not found!');
            return $success;
        }

        if (!empty($model->card_owner)) {
            $success['success'] = false;
            $success['message'] = Yii::t('app', 'Card  is already assigned!');
            return $success;
        }

        $model->card_owner = $post['owner'];
        $model->is_active = 1;
        if ($model->save()) {
            $success['success'] = true;
            $success['message'] = Yii::t('app', 'Card was registred Successfully!');
            return $success;
        }

        Yii::error($model->errors);

        $success['success'] = false;
        $success['message'] = Yii::t('app', 'Card was not assigned!');
        return $success;
    }
}
