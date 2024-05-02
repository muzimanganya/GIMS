<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StockHistoriesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-histories-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'stock_in') ?>

    <?= $form->field($model, 'stock_out') ?>

    <?= $form->field($model, 'previous_balance') ?>

    <?= $form->field($model, 'Balance') ?>

    <?= $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'previous_price') ?>

    <?php // echo $form->field($model, 'new_price') ?>

    <?php // echo $form->field($model, 'current_price') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'reference') ?>

    <?php // echo $form->field($model, 'product') ?>

    <?php // echo $form->field($model, 'store') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
