<?php
use yii\helpers\Html;
use kartik\select2\Select2;

echo $form->field($model, 'category')->widget(Select2::class, [
    'data' => \yii\helpers\ArrayHelper::map($categories, 'code', 'name'),
    'options' => ['placeholder' => 'Select an account category ...'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]);
