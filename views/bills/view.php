<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Bills $model */

$this->title = $model->bill_no;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bills'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bills-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'bill_no' => $model->bill_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'bill_no' => $model->bill_no], [
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
            'bill_no',
            'bill_date',
            'reference',
            'STATUS',
            'tax_catculation',
            'note',
            'due_date',
            'created_at',
            'updated_at',
            'amount',
            'id',
            'created_by',
            'updated_by',
            'vendor',
            'purchase_number',
        ],
    ]) ?>

</div>
