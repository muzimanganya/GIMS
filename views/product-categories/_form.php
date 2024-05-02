<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var app\models\ProductCategories $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_active')->checkbox() ?>

   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
