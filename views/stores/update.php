<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stores $model */

$this->title = Yii::t('app', 'Update Stores: {name}', [
    'name' => $model->NAME,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="stores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
