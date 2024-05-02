<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PurchaseOrders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="purchase-orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'purchase_number')->textInput() ?>

    <?= $form->field($model, 'po_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'due_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_calculation')->textInput() ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'supplier')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
