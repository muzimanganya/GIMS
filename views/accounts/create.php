<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Accounts $model */

$this->title = Yii::t('app', 'New Account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accounts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
