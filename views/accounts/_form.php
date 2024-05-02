<?php
// Assuming you have a controller named 'YourController'

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\bootstrap\Html;
use yii\helpers\Url;

$url = Url::to(['accounts/get-categories']); // Update 'your-controller' to the actual name of your controller
?>

<div class="accounts-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CODE')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'TYPE')->widget(Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\AccountTypes::find()->all(), 'code', 'name'),
        'options' => [
            'id' => 'account-type',
            'placeholder' => 'Select an account type ...'
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]) ?>
    
    <?= $form->field($model, 'category')->widget(Select2::class, [
        'options' => [
            'id' => 'account-category',
            'placeholder' => 'Select an account category ...'
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]) ?>

    <?php
    // AJAX script to dynamically load categories based on the selected account type
    $script = <<< JS
    $('#account-type').on('change', function() {
        var typeId = $(this).val();
        $.ajax({
            url: '{$url}', // Use the assigned URL
            type: 'GET',
            data: {typeId: typeId},
            success: function(data) {
                // Clear the current options
                $('#account-category').empty();
                
                // Append the new options
                $.each(data.categories, function(index, category) {
                    var option = new Option(category.name, category.code, false, false);
                    $('#account-category').append(option).trigger('change');
                });
            }
        });
    });
JS;

    $this->registerJs($script);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
