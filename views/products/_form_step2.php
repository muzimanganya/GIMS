<!-- views/product/_form_step2.php -->
<?php $form = \yii\widgets\ActiveForm::begin(['action' => ['create', 'step' => 2]]); ?>

<?= $form->field($model, 'is_sold')->textInput() ?>
<?= $form->field($model, 'is_purchase')->textInput() ?>
<?= $form->field($model, 'reorder_level')->textInput() ?>

<div class="form-group">
    <?= yii\helpers\Html::submitButton('Next', ['class' => 'btn btn-primary']) ?>
</div>

<?php \yii\widgets\ActiveForm::end(); ?>
