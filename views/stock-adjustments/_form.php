<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StockAdjustments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-adjustments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TYPE')->textInput() ?>

    <?= $form->field($model, 'adjustement_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'product')->textInput() ?>

    <?= $form->field($model, 'store')->textInput() ?>

    <?= $form->field($model, 'ACCOUNT')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
