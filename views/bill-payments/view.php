<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\BillPayments */

$this->title = $model->no;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bill Payments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bill-payments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'no' => $model->no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'no' => $model->no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no',
            'amount',
            'created_at',
            'updated_at',
            'payment_mode',
            'bill',
            'purchase_order',
            'created_by',
            'updated_by',
            'account',
            'bank_account',
        ],
    ]) ?>

</div>
