<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\api\modules\v1\models\SearchInvoicePayments */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Invoice Payments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-payments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Invoice Payments'), ['invoices/invoice'], ['class' => 'btn btn-success']) ?>
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
            //'created_by',
            //'updated_by',
            //'invoice',
            //'account',
            //'bank_account',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
