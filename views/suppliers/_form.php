<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var app\models\Suppliers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="suppliers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textArea(['maxlength' => true]) ?>

   
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
