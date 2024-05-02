<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FindReport */
/* @var $form ActiveForm */
?>
<div class="reports-_findReport">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'report')->dropDownList([
            'general-report'=>Yii::t('app', 'General Report'),
			'station'=>Yii::t('app', 'Stations report'),
			'revenue-fuel'=>Yii::t('app', 'Revenue vs Fuel'),
			'vehicle'=>Yii::t('app', 'Vehicle Report'),
            'bus-leasing'=>Yii::t('app','Bus Leasing Report'),
            'bus-leasing-report'=>Yii::t('app','Bus Leasing History'),
            'customer'=>Yii::t('app','Customer Report'),
            'repairs-report'=>Yii::t('app','Garage Report'),
            'repairs-history'=>Yii::t('app','Vehicle garage History'),
            'meal-stipend-drivers'=>Yii::t('app','Meal Stipend Drivers'),
            'meal-stipend-vehicle'=>Yii::t('app','Meal Stipend Vehicle'),
            'car-rental-schedule'=>Yii::t('app','Car Rental Schedule'),
            'contervation'=>Yii::t('app','Fines Report'),
            'car-wash'=>Yii::t('app','Car Wash Report'),
            'car-documents'=>Yii::t('app','Car Documents'),
            'car-documents-report'=>Yii::t('app','Car Documents Report')
        ]) ?>

        <div class='row'>
            <div class='col-md-6'>
                <?= $form->field($model, 'start')->widget(\yii\jui\DatePicker::classname(), [
                    'options' => ['class' => 'form-control'],
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ]) ?>
            </div>
            <div class='col-md-6'>
                <?= $form->field($model, 'end')->widget(\yii\jui\DatePicker::classname(), [
                    'options' => ['class' => 'form-control'],
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ]) ?>
            </div>
        </div>    
        
        <?= $form->field($model, 'reference')->textInput() ?> 
        
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Find'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- reports-_findReport -->
