<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\InventorySalesDetails $model */

$this->title = Yii::t('app', 'Update Inventory Sales Details: {name}', [
    'name' => $model->product,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventory Sales Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product, 'url' => ['view', 'product' => $model->product, 'sale_id' => $model->sale_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="inventory-sales-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
