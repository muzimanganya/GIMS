<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Taxes $model */

$this->title = Yii::t('app', 'Update Taxes: {name}', [
    'name' => $model->NAME,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Taxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'percent' => $model->percent]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="taxes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
