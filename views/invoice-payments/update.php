<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\InvoicePayments */

$this->title = Yii::t('app', 'Update Invoice Payments: {name}', [
    'name' => $model->no,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Invoice Payments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no, 'url' => ['view', 'no' => $model->no]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="invoice-payments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
