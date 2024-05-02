<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\api\modules\v1\models\SearchBillPayments */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bill Payments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-payments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bill Payments'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no',
            'amount',
            'created_at',
            'updated_at',
            'payment_mode',
            //'bill',
            //'purchase_order',
            //'created_by',
            //'updated_by',
            //'account',
            //'bank_account',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
