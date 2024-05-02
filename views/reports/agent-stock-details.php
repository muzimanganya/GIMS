<?php

use app\models\User;
use app\modules\api\modules\v1\models\Card;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\api\modules\v1\models\SearchCard */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cards');
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $agentName;
?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => Yii::t('app', 'Showing {begin}-{end} of {totalCount} Cards'),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'label',
            [
                'attribute' =>  'status',
                'value' => function ($model) {
                    return $model->getStatuses()[$model->status] ?? Yii::t('app', 'Invalid Status');
                },
                'filter' => Card::getAllStatuses(),
            ],
            [
                'attribute' =>  'card_owner',
                'value' => function ($model) {
                    return $model->cardOwnerR->name ?? Yii::t('app', 'Not assigned');
                }
            ],
            [
                'attribute' =>  'agent',
                'value' => function ($model) {
                    return $model->agentR->name ?? null;
                },
                'filter' => ArrayHelper::map(User::find()->where(['id' => $agent])->all(), 'id', 'name'),
            ],
            'expires_on:date',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>