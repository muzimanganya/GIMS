<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\InventorySalesDetails $model */

$this->title = Yii::t('app', 'Create Inventory Sales Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventory Sales Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-sales-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
