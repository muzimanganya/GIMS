<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\PurchaseOrders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="purchase-orders-form">

    <?php $form = ActiveForm::begin(); ?>
    <div>
    
    <?= Html::a('<label style="cursor: pointer;" class="form-label has-star">New Vendor <i class="fa fa-plus-circle"></i></label>', ['suppliers/create','po'=>1]) ?>
    <?= $form->field($model, 'supplier', ['options' => ['class' => 'form-group'], 'labelOptions' => ['style' => 'display:none;']])
    ->widget(Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Suppliers::find()->all(), 'id', 'NAME'),
        'options' => ['placeholder' => 'Select Vendor ...'],
        'pluginOptions' => ['allowClear' => true],
    ]) ?>    
</div>
<?= $form->field($model, 'purchase_number')->textInput(['maxlength' => true, 'disabled' => true]) ?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'po_date')->widget(\kartik\date\DatePicker::class, [
            'options' => ['placeholder' => 'Select PO Date'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ],
        ]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'due_date')->widget(\kartik\date\DatePicker::class, [
            'options' => ['placeholder' => 'Select Due Date'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ],
        ]) ?>
    </div>
</div>



<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'tax_calculation')->dropDownList([
            '1' => Yii::t('app', 'Inclusive'),
            '0' => Yii::t('app', 'Exclusive'),
        ], ['prompt' => Yii::t('app', 'Select Tax Calculation')]) ?>
    </div>
</div>





   
    
    
    <?= $form->field($model, 'note')->textArea(['maxlength' => true]) ?>

   
   
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save & Continue'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
