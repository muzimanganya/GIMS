<?php

use app\models\Payments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PaymentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Payments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Payments'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NO',
            'amount',
            'reference',
            'date_of_payment',
            'created_at',
            //'updated_at',
            //'outstanding',
            //'created_by',
            //'updated_by',
            //'currency',
            //'payment_mode',
            //'bill_no',
            //'pay_from',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Payments $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'NO' => $model->NO]);
                 }
            ],
        ],
    ]); ?>


</div>
