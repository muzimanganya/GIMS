<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Distributed Cards Stock');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => null,
        'layout' => '{items}{summary}{pager}',
        'showFooter' => true,
        'footerRowOptions' => ['style' => 'font-weight:bold;font-size: 16px;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'agent',
                'label' => Yii::t('app', 'Receiving Agent'),
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a($model['agent'], ['agent-stock-details', 'agent' => $model['agent_id']]);
                }
            ],
            [
                'attribute' => 'received',
                'label' => Yii::t('app', 'Received Cards'),
                'format' => 'integer',
                'footer' => $cardsCount,
            ],
            [
                'attribute' => 'sold',
                'label' => Yii::t('app', 'Sold Cards'),
                'format' => 'integer',
                'footer' => $cardsSold,
            ],
        ],
    ]); ?>
</div>