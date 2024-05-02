<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var app\models\Taxes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="taxes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'percent')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
