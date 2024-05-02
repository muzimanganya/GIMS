<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\api\modules\v1\models\Products;
use app\modules\api\modules\v1\models\Customers;
use app\modules\api\modules\v1\models\Branch;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\Invoices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoices-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'no')->textInput(['maxlength' => 255]) ?>
     
            <?= $form->field($model, 'idate')->widget(\yii\jui\DatePicker::classname(), [
                    'options' => ['class' => 'form-control'],
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ]) ?>
           

    
    
    
    <?= $form->field($model, 'memo')->textArea(['maxlength' => true]) ?>
    <?= $form->field($model, 'customer')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Customers::find()->all(), 'id', function ($model) {
                        return $model->name;
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Select Customer')],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])  ?>

    <?= $form->field($model, 'branch')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Branch::find()->all(), 'id', function ($model) {
                        return $model->name;
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Select Branch')],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])  ?>




    

    

     <?= $form->field($model, 'payment_due')->widget(\yii\jui\DatePicker::classname(), [
                    'options' => ['class' => 'form-control'],
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
