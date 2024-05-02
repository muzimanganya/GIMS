<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StockMovemements $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-movemements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mouvement_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantitty')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'TYPE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'store_from')->textInput() ?>

    <?= $form->field($model, 'store_to')->textInput() ?>

    <?= $form->field($model, 'product')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
