<?php

use app\models\Receipt;
use app\models\ReceiptDetail;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\api\modules\v1\models\Products;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Receipt */
/* @var $form yii\widgets\ActiveForm */
/* @var $modelDetail app\models\ReceiptDetail */
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<?php $this->registerJs("
    $('.delete-button').click(function() {
        var detail = $(this).closest('.receipt-detail');
        var updateType = detail.find('.update-type');
        if (updateType.val() === " . json_encode(ReceiptDetail::UPDATE_TYPE_UPDATE) . ") {
            //marking the row for deletion
            updateType.val(" . json_encode(ReceiptDetail::UPDATE_TYPE_DELETE) . ");
            detail.hide();
        } else {
            //if the row is a new row, delete the row
            detail.remove();
        }

    });
");
?>
<div class="receipt-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
    <?= "<h2>Details</h2>"?>

    <?php foreach ($modelDetails as $i => $modelDetail) : ?>
        <div class="row receipt-detail receipt-detail-<?= $i ?>">
           
			<table>
              <tr>
			  <td>
				<?= $form->field($modelDetail, "[{$i}]id")->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Products::find()->all(), 'code', function ($model) {
                        return $model->name;
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Select Supplier')],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label(FALSE)  ?></td><td>
                <?= Html::activeHiddenInput($modelDetail, "[$i]updateType", ['class' => 'update-type']) ?>
                <?= $form->field($modelDetail, "[$i]item_name")->label(FALSE)  ?></td><td>
            
            
                <?= Html::button('x', ['class' => 'delete-button btn btn-danger', 'data-target' => "receipt-detail-$i"]) ?>
           </td></tr></table>
        </div>
    <?php endforeach; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton('Add row', ['name' => 'addRow', 'value' => 'true', 'class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

