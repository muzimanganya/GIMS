<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BillDetails $model */

$this->title = Yii::t('app', 'Create Bill Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bill Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
