<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form kartik\form\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'purchase_price')->textInput() ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'sales_price')->textInput() ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'is_sold')->checkbox() ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'is_purchase')->checkbox() ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'reorder_level')->textInput() ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'measure')->widget(Select2::class, [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Measures::find()->all(),'CODE', 'NAME'),
                    'options' => ['placeholder' => 'Select a Measure ...'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'product_category')->widget(Select2::class, [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\ProductCategories::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select a Category ...'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'product_type')->widget(Select2::class, [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\ProductTypes::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select a Type ...'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                
                <?= $form->field($model, 'sales_tax')->widget(Select2::class, [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Taxes::find()->all(), 'percent', 'NAME'),
                    'options' => ['placeholder' => 'Select a Sales Tax ...'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
            </div>
            <div class="form-group">
                
                <?= $form->field($model, 'purchase_tax')->widget(Select2::class, [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Taxes::find()->all(), 'percent', 'NAME'),
                    'options' => ['placeholder' => 'Select a Puurchase Tax ...'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'sales_account')->widget(Select2::class, [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Accounts::find()->all(), 'CODE', 'NAME'),
                    'options' => ['placeholder' => 'Select a Sales Account ...'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'purchase_account')->widget(Select2::class, [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Accounts::find()->all(), 'CODE', 'NAME'),
                    'options' => ['placeholder' => 'Select a Purchase Account ...'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'discount_account')->widget(Select2::class, [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Accounts::find()->all(), 'CODE', 'NAME'),
                    'options' => ['placeholder' => 'Select a Discount Account ...'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
