<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bills $model */

$this->title = Yii::t('app', 'Update Bills: {name}', [
    'name' => $model->bill_no,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bills'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bill_no, 'url' => ['view', 'bill_no' => $model->bill_no]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bills-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
