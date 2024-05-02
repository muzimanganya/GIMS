<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Measures $model */

$this->title = Yii::t('app', 'Update Measures: {name}', [
    'name' => $model->NAME,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Measures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'CODE' => $model->CODE]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="measures-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
