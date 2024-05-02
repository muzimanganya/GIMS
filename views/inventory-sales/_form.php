

<div class="inventory-sale-form">

    <?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;

 $form = ActiveForm::begin([
        'id' => 'dynamic-form',
        'type' => ActiveForm::TYPE_VERTICAL,
        'action' => ['/inventory/inventory-sales/create'],
        'method' => 'post',
    ]); ?>

    <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken); ?>
   
    <div class='row'>
    <div class="col-md-2">
    <?= $form->field($model, 'sale_date')->widget(DatePicker::class, [
        'options' => ['placeholder' => 'Select sale date'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd', // You can adjust the date format as needed
        ]
    ])->label('Sale Date'); ?>
</div>
        <div class="col-md-3">
        <?= Html::a(
    Yii::t('app', '<label style="cursor: pointer;" class="form-label has-star">New Customer <i class="fa fa-plus-circle"></i></label>'),
    ['customers/create', 'po' => 1]
) ?>

    <?= $form->field($model, 'customer', ['options' => ['class' => 'form-group'], 'labelOptions' => ['style' => 'display:none;']])
    ->widget(Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Customers::find()->all(), 'id', 'NAME'),
        'options' => ['placeholder' => 'Select Customer ...'],
        'pluginOptions' => ['allowClear' => true],
    ]) ?>
        </div>
        <div class='col-md-3'>
            <?= $form->field($model, 'store')->textInput(['class' => 'form-control'])->label('Store'); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'bank_account')->textInput(['class' => 'form-control'])->label('Bank account'); ?>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <!-- Widget code goes here -->
        </div>

        

        <div class="form-group" style="padding: 15px;">
            <?= Html::submitButton('Save Sale Details', ['class' => 'btn btn-primary btn-block']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
