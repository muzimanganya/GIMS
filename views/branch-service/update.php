<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\BranchService */

$this->title = Yii::t('app', 'Update Branch Service: {name}', [
    'name' => $model->branch,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Branch Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->branch, 'url' => ['view', 'branch' => $model->branch, 'service' => $model->service]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="branch-service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
