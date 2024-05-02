<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\EstmateDetails */

$this->title = $model->item;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estmate Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estmate-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'item' => $model->item, 'estimate' => $model->estimate], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'item' => $model->item, 'estimate' => $model->estimate], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'quantity',
            'price',
            'created_at',
            'updated_at',
            'item',
            'estimate',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
