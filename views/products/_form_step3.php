<!-- views/product/_form_step3.php -->
<?php $form = \yii\widgets\ActiveForm::begin(['action' => ['create', 'step' => 3]]); ?>

<?= $form->field($model, 'sales_tax')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'purchase_tax')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'sales_account')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'purchase_account')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'discount_account')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'measure')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= yii\helpers\Html::submitButton('Finish', ['class' => 'btn btn-success']) ?>
</div>

<?php \yii\widgets\ActiveForm::end(); ?>
