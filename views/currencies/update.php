<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Currencies $model */

$this->title = Yii::t('app', 'Update Currencies: {name}', [
    'name' => $model->NAME,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Currencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'CODE' => $model->CODE]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="currencies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
