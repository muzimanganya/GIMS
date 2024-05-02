<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\api\modules\v1\models\Accounts;
use app\modules\api\modules\v1\models\BankAccounts;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\InvoicePayments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-payments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'invoice')->textInput(['maxlength' => true,'disabled' => true]) ?>
    <?= $form->field($model, 'amount')->textInput() ?>
    
	<?= $form->field($model, 'payment_mode')->dropDownList([
            'Africa/Kigali'=>'Rwanda/Burundi Time',
            'Africa/Kampala'=>'Tanzania/Kenya/Uganda Time', 
    ]) ?>
	<?= $form->field($model,'account')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Accounts::find()->all(), 'id', function ($model) {
                        return $model->name;
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Select an account')],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])  ?>
				
	
	<?= $form->field($model,'bank_account')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(BankAccounts::find()->all(), 'account', function ($model) {
                        return $model->account.' '.$model->currency.' '.$model->bank;
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Select a bank')],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])  ?>
				
				 <?= Html::a(Yii::t('app', 'New Account / Momo code or Phone'), ['update', 'no' => $model->no], ['class' => 'btn-warning pull-right']) ?>

    <br>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
