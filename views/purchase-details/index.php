<?php

use app\models\PurchaseDetails;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PurchaseDetailsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Purchase Details');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Purchase Details'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            
            'price',
            'quantity',
            'created_at',
            'updated_at',
            //'created_by',
            //'updated_by',
            //'purchase_number',
            //'product',
            //'tax',
            //'ACCOUNT',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PurchaseDetails $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
