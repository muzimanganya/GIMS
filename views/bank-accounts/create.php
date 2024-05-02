<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BankAccounts $model */

$this->title = Yii::t('app', 'Create Bank Accounts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bank Accounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-accounts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
