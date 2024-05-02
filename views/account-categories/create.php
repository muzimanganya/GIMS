<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AccountCategories $model */

$this->title = Yii::t('app', 'New Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Account Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
