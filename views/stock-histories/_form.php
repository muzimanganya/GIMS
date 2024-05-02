<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\StockHistories $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-histories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stock_in')->textInput() ?>
    <?= $form->field($model, 'store', ['options' => ['class' => 'form-group'], 'labelOptions' => ['style' => 'display:none;']])
    ->widget(Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Stores::find()->all(), 'id', 'NAME'),
        'options' => ['placeholder' => 'Select Store ...'],
        'pluginOptions' => ['allowClear' => true],
    ]) ?> 
    <?= $form->field($model, 'stock_out')->textInput() ?>

    <?= $form->field($model, 'previous_balance')->textInput() ?>

    <?= $form->field($model, 'Balance')->textInput() ?>

    <?= $form->field($model, 'previous_price')->textInput() ?>

    <?= $form->field($model, 'new_price')->textInput() ?>

    <?= $form->field($model, 'current_price')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product')->textInput() ?>

    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
