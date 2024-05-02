<!-- _new_vendor_modal.php -->

<?php
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $newVendorModel app\models\Suppliers */

// Ensure $newVendorModel is defined
$newVendorModel = $newVendorModel ?? new \app\models\Suppliers();

$form = ActiveForm::begin([
    'id' => 'new-vendor-form',
    'action' => ['suppliers/create'], // Adjust the action based on your controller and action names
    'method' => 'post',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
]);
?>

<?= $form->field($newVendorModel, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($newVendorModel, 'contact_person')->textInput(['maxlength' => true]) ?>
<?= $form->field($newVendorModel, 'email')->textInput(['maxlength' => true, 'type' => 'email']) ?>
<?= $form->field($newVendorModel, 'phone')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
