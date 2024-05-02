<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\EstmateDetails */

$this->title = Yii::t('app', 'Update Estmate Details: {name}', [
    'name' => $model->item,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estmate Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item, 'url' => ['view', 'item' => $model->item, 'estimate' => $model->estimate]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estmate-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
