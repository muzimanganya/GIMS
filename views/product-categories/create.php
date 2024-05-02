<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductCategories $model */

$this->title = Yii::t('app', 'Create Product Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
