<?php

use app\models\InventorySalesDetails;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\InventorySalesDetailsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Inventory Sales Details');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-sales-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Inventory Sales Details'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product',
            'price',
            'quantity',
            'tax',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            //'sale_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, InventorySalesDetails $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'product' => $model->product, 'sale_id' => $model->sale_id]);
                 }
            ],
        ],
    ]); ?>


</div>
