<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Currencies $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="currencies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

 

    <?= $form->field($model, 'symbol')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
