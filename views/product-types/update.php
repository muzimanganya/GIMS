<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductTypes $model */

$this->title = Yii::t('app', 'Update Product Types: {name}', [
    'name' => $model->NAME,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
