<?php

use app\models\PurchaseOrders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PurchaseOrdersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Purchase Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Purchase Orders'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 [
                'attribute' => 'purchase_number',
                'format' => 'raw', // 'raw' format is required for rendering HTML
                'value' => function ($model) {
                    $url = ['view', 'purchase_number' => $model->purchase_number]; // Adjust the route according to your application
                    return Html::a($model->purchase_number, $url);
                },
            ],           
            'purchase_number',
            'po_date',
            'reference',
            'due_date',
            'STATUS',
            //'tax_calculation',
            //'note',
            //'created_at',
            //'updated_at',
            //'amount',
            //'id',
            //'created_by',
            //'updated_by',
            //'supplier',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PurchaseOrders $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'purchase_number' => $model->purchase_number]);
                 }
            ],
        ],
    ]); ?>


</div>
