<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\BillPayments */

$this->title = Yii::t('app', 'Update Bill Payments: {name}', [
    'name' => $model->no,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bill Payments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no, 'url' => ['view', 'no' => $model->no]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bill-payments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
