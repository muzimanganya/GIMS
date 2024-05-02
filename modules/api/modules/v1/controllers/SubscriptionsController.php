<?php

namespace app\modules\api\modules\v1\controllers;

use app\modules\api\modules\v1\models\Bus;
use app\modules\api\modules\v1\models\Card;
use app\modules\api\modules\v1\models\CardSubscription;
use app\modules\api\modules\v1\models\CardUsage;
use DateTime;
use Yii;
use yii\rest\Controller;

class SubscriptionsController extends Controller
{
    public function actionTopup()
    {
        $post = Yii::$app->request->post();
        $success = [];

        $model = Card::find()->where(['id' => $post['card']])->one();
        if (empty($model)) {
            $success['success'] = false;
            $success['message'] = Yii::t('app', 'Card was not found!');
            return $success;
        }

        $model->expires_on = \DateTime::createFromFormat('Y-m-d', date('Y-m-d'))->format('Y-m-t');
        $model->is_active = 1;

        if ($model->save()) {
            //record history
            $history = new CardSubscription([
                'card' => $post['card'],
                'days' => 30,
                'start_date' => date('Y-m-d'),
                'end_date' => $model->expires_on,
                'amount' => $post['amount'],
                'currency' => $post['currency'],
            ]);
            if (!$history->save()) {
                Yii::error($history->errors);
            }

            $success['success'] = true;
            $success['message'] = Yii::t('app', 'Card was registered Successfully!');
            return $success;
        }

        Yii::error($model->errors);

        $success['success'] = false;
        $success['message'] = Yii::t('app', 'Card subscription was not renewed!');
        return $success;
    }

    public function actionValidate()
    {
        $post = Yii::$app->request->post();
        $success = [];

        Yii::error($post);

        $model = Card::find()->where(['id' => $post['card']])->one();
        if (empty($model)) {
            $success['success'] = false;
            $success['message'] = Yii::t('app', 'Card was not found!');
            return $success;
        }

        $date = Yii::$app->formatter->asDate($model->expires_on);

        if ($model->expires_on < date('Y-m-d')) {
            $success['success'] = false;
            $success['message'] = Yii::t('app', 'Card subscription have expired!. Date: {d}', ['d' => $date]);
            return $success;
        }

        //record
        $usage = new CardUsage([
            'card' => $post['card'],
            'bus' => Bus::find()->one()->plate_number,
            'boarding_time' => time(),
        ]);
        if (!$usage->save()) {
            Yii::error($usage->errors);

            $success['success'] = false;
            $success['message'] = Yii::t('app', 'Card usage could not be recorded, try again!');
            return $success;
        }

        $success['success'] = true;
        $success['message'] = Yii::t('app', 'Card subscription is valid. Expiring on {d}', ['d' => $date]);
        return $success;
    }
}
