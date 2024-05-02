<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\modules\api\modules\v1\models\Branch;
use app\modules\api\modules\v1\models\Products;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\BranchService */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branch-service-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model,'branch')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Branch::find()->all(), 'id', function ($model) {
                        return $model->name;
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Select an Branch')],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])  ?>


    <?= $form->field($model,'service')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Products::find()->all(), 'code', function ($model) {
                        return $model->name;
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Select Service')],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])  ?>
    
   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
