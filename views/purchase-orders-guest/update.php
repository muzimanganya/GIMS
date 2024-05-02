<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PurchaseOrders $model */

$this->title = Yii::t('app', 'Update Purchase Orders: {name}', [
    'name' => $model->purchase_number,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purchase_number, 'url' => ['view', 'purchase_number' => $model->purchase_number]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="purchase-orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
