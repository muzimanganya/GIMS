<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AccountTypes $model */

$this->title = Yii::t('app', 'New Account Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Account Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
