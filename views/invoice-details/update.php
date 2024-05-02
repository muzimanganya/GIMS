<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\InvoiceDetails */

$this->title = Yii::t('app', 'Update Invoice Details: {name}', [
    'name' => $model->item,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Invoice Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item, 'url' => ['view', 'item' => $model->item, 'invoice' => $model->invoice]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="invoice-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
