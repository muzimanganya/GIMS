<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\EstmateDetails */

$this->title = Yii::t('app', 'Create Estmate Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estmate Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estmate-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
