<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\InventorySalesDetails $model */

$this->title = $model->product;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventory Sales Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inventory-sales-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'product' => $model->product, 'sale_id' => $model->sale_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'product' => $model->product, 'sale_id' => $model->sale_id], [
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
            'id',
            'product',
            'price',
            'quantity',
            'tax',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'sale_id',
        ],
    ]) ?>

</div>
