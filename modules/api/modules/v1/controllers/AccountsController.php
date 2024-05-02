<?php

namespace app\modules\api\modules\v1\controllers;

use app\modules\api\modules\v1\models\User;
use Yii;
use yii\rest\Controller;

class AccountsController extends Controller
{
    public function actionLogin()
    {
        $post = Yii::$app->request->post();
        $success = ['token' => ''];

        Yii::error($post);
        $model = User::find()->where(['username' => $post['username']])->one();
        if (empty($model)) {
            $success['success'] = false;
            $success['message'] = Yii::t('app', 'Invalid username or password');
            return $success;
        }

        if (Yii::$app->security->validatePassword($post['password'], $model->password)) {
            $model->generateToken();

            $success['success'] = true;
            $success['message'] = Yii::t('app', 'Login was successful!');
            $success['token'] = $model->token_id;
            return $success;
        } else {
            $success['success'] = false;
            $success['message'] = Yii::t('app', 'Invalid username or password');
            return $success;
        }
    }
}
