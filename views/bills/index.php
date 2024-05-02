<?php

use app\models\Bills;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BillsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Bills');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bills-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bills'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bill_no',
            'bill_date',
            'reference',
            'STATUS',
            'tax_catculation',
            //'note',
            //'due_date',
            //'created_at',
            //'updated_at',
            //'amount',
            //'id',
            //'created_by',
            //'updated_by',
            //'vendor',
            //'purchase_number',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bills $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'bill_no' => $model->bill_no]);
                 }
            ],
        ],
    ]); ?>


</div>
