<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductBrands $model */

$this->title = Yii::t('app', 'New Product Brand');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-brands-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
