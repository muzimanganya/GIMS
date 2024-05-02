<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PurchaseOrders $model */

$this->title = $model->purchase_number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="purchase-orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'purchase_number' => $model->purchase_number], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'purchase_number' => $model->purchase_number], [
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
            'purchase_number',
            'po_date',
            'reference',
            'due_date',
            'STATUS',
            'tax_calculation',
            'note',
            'created_at',
            'updated_at',
            'amount',
            'id',
            'created_by',
            'updated_by',
            'supplier',
        ],
    ]) ?>

</div>
