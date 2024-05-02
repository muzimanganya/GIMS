<?php

use app\models\User;
use app\modules\api\modules\v1\models\Card;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\api\modules\v1\models\SearchCard */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cards Sold');
$this->params['breadcrumbs'][] = $this->title;
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
                'filter' => ArrayHelper::map(User::find()->all(), 'id', 'name'),
            ],
            'assigned_at:datetime',
            [
                'attribute' =>  'assigned_by',
                'value' => function ($model) {
                    return $model->assignedBy->name;
                }
            ],
            'expires_on:date',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>