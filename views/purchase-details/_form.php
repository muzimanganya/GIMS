<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\PurchaseDetails $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="purchase-details-form">

    <?php $form = ActiveForm::begin(); ?>

    
   
    <?= $form->field($model, 'product')->widget(Select2::class, [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Products::find()->all(), 'id', 'NAME'),
                    'options' => ['placeholder' => 'Select Product'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>

<?= $form->field($model, 'price')->textInput() ?>

<?= $form->field($model, 'quantity')->textInput() ?>
   
    <?= $form->field($model, 'tax')->widget(Select2::class, [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Taxes::find()->all(), 'percent', 'NAME'),
                    'options' => ['placeholder' => 'Select Purchase Tax ...'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
        

   
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
