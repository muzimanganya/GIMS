<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductModels $model */

$this->title = Yii::t('app', 'Create Product Models');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-models-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
