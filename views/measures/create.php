<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Measures $model */

$this->title = Yii::t('app', 'Create Measures');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Measures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="measures-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
