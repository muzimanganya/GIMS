<?php

use app\models\StockAdjustments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StockAdjustmentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Stock Adjustments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-adjustments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Stock Adjustments'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'TYPE',
            'adjustement_date',
            'reference',
            'observation',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'product',
            //'store',
            //'ACCOUNT',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StockAdjustments $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
