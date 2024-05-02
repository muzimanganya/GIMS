<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stores $model */

$this->title = Yii::t('app', 'Create Stores');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
