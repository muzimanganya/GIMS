<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\InventorySales $model */

$this->title = Yii::t('app', 'New Sale');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventory Sales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-sales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
