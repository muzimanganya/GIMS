<?php

use app\models\StockHistories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StockHistoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Stock Histories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-histories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Stock Histories'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stock_in',
            'stock_out',
            'previous_balance',
            'Balance',
            'id',
            //'previous_price',
            //'new_price',
            //'current_price',
            //'type',
            //'quantity',
            //'reference',
            //'product',
            //'store',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StockHistories $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
