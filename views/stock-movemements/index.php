<?php

use app\models\StockMovemements;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StockMovemementsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Stock Movemements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-movemements-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Stock Movemements'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'mouvement_date',
            'quantitty',
            'created_at',
            'updated_at',
            //'TYPE',
            //'reference',
            //'created_by',
            //'updated_by',
            //'store_from',
            //'store_to',
            //'product',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StockMovemements $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
