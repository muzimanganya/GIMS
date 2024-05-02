<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductTypes $model */

$this->title = Yii::t('app', 'New Product Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
