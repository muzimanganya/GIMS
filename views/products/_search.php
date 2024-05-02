<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'purchase_price') ?>

    <?= $form->field($model, 'sales_price') ?>

    <?php // echo $form->field($model, 'is_sold') ?>

    <?php // echo $form->field($model, 'is_purchase') ?>

    <?php // echo $form->field($model, 'reorder_level') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'product_model') ?>

    <?php // echo $form->field($model, 'product_category') ?>

    <?php // echo $form->field($model, 'product_type') ?>

    <?php // echo $form->field($model, 'sales_tax') ?>

    <?php // echo $form->field($model, 'purchase_tax') ?>

    <?php // echo $form->field($model, 'sales_account') ?>

    <?php // echo $form->field($model, 'purchase_account') ?>

    <?php // echo $form->field($model, 'discount_account') ?>

    <?php // echo $form->field($model, 'measure') ?>

    <?php // echo $form->field($model, 'product_brand') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
