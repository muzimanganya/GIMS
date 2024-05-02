<!-- views/product/_form_step1.php -->
<?php $form = \yii\widgets\ActiveForm::begin(['action' => ['create', 'step' => 1]]); ?>

<?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'purchase_price')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'sales_price')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= yii\helpers\Html::submitButton('Next', ['class' => 'btn btn-primary']) ?>
</div>

<?php \yii\widgets\ActiveForm::end(); ?>
