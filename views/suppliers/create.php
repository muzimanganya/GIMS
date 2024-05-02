<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Suppliers $model */

$this->title = Yii::t('app', 'New Supplier');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Suppliers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suppliers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
