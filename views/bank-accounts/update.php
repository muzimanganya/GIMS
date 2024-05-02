<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BankAccounts $model */

$this->title = Yii::t('app', 'Update Bank Accounts: {name}', [
    'name' => $model->NAME,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bank Accounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'NAME' => $model->NAME]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bank-accounts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
