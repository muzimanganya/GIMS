 <?php

use app\modules\api\modules\v1\models\Bills;
use app\modules\api\modules\v1\models\EstmateDetails;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\api\modules\v1\models\Products;
use app\modules\api\modules\v1\models\Customers;
use app\modules\api\modules\v1\models\Branch;
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
        if (updateType.val() === " . json_encode(EstmateDetails::UPDATE_TYPE_UPDATE) . ") {
            //marking the row for deletion
            updateType.val(" . json_encode(EstmateDetails::UPDATE_TYPE_DELETE) . ");
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

    <?= $form->field($model, 'no')->textInput(['maxlength' => 255]) ?>
	 
	        <?= $form->field($model, 'idate')->widget(\yii\jui\DatePicker::classname(), [
                    'options' => ['class' => 'form-control'],
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ]) ?>

	
    
    <?= $form->field($model, 'discount')->textInput() ?>
    <?= $form->field($model, 'memo')->textInput(['maxlength' => true]) ?>
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
    <?= "<h2>Items</h2>"?>

    <?php foreach ($modelDetails as $i => $modelDetail) : ?>
        <div class="row receipt-detail receipt-detail-<?= $i ?>">
           
			<table>
              <tr>
			 <td>
				<?= $form->field($modelDetail, "[{$i}]item")->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Products::find()->all(), 'code', function ($model) {
                        return $model->name;
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Select Item')],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])  ?></td><td>
               
                <?= $form->field($modelDetail, "[$i]quantity")  ?></td><td>
				
				<?= Html::activeHiddenInput($modelDetail, "[$i]updateType", ['class' => 'update-type']) ?><td>
				<?= $form->field($modelDetail, "[$i]price")  ?></td><td>
				
            
            
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

