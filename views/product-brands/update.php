<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductBrands $model */

$this->title = Yii::t('app', 'Update Product Brands: {name}', [
    'name' => $model->NAME,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-brands-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
