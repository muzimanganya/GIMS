<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\InvoiceDetails */

$this->title = Yii::t('app', 'Create Invoice Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Invoice Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
