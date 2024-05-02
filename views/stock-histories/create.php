<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StockHistories $model */

$this->title = Yii::t('app', 'Create Stock Histories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-histories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
