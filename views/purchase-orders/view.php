<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use app\models\Users;
use app\models\InStock;
use app\models\PurchaseDetails;
use app\modules\api\modules\v1\models\User;
use kartik\grid\ActionColumn;
use kartik\grid\GridView as GridGridView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->purchase_number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$this->registerJs('
    $("#modalButton").click(function(){
         
            $("#modal").modal("show")
                .find("#modalContent")
                .load($(this).attr("value"));
            
       
    });

');
?>
<?php 
    Modal::begin([
        'header'=>'<h3>New Spare for '.$this->title.'</h3>',
        'id'=>'modal',
        'size'=>'modal-md',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    

?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    
       
    <!-- <?= Html::a('label', ['/controller/action'], ['class'=>'btn btn-primary pull-right']) ?> -->
    <?= Html::a(Yii::t('app', 'Download '), ['download-pdf', 'po' => $model->purchase_number], ['class' => 'btn btn-info pull-right']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'purchase_number' => $model->purchase_number], [
            'class' => 'btn btn-danger pull-right',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> 
         <?= Html::a(Yii::t('app', 'Update'), ['update', 'purchase_number' => $model->purchase_number], ['class' => 'btn btn-primary pull-right']) ?>
        <?= Html::button(Yii::t('app', ' Add Product'), ['value'=>Url::to(['/purchase-details/create','purchase_number' => $model->purchase_number]),'class' => 'btn btn-success pull-right','id'=>'modalButton']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'purchase_number',
            [
                'attribute' => 'supplier',
                'value' => function ($model) {
                    return $model->supplier0->NAME;
                },
            ],
            [
                'attribute' => 'tax_calculation',
                'value' => function ($model) {
                    if ($model->tax_calculation) {
                        return Yii::t('app', 'Include');
                    }
                    return Yii::t('app', 'Exclude');
                },
            ],
            'po_date',
            'due_date',
            'reference',
            'STATUS',

            'note',
            'created_at:datetime',
        ],
    ]) ?>


<h4> Details</h4>
<?= GridGridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout'=>'{items}',
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'product',
                'value'=>function($model)
                {
                    return $model->product0->NAME;
                }
            ],
            'price',
            'quantity',
            'received',
            //'created_at',
           // 'updated_at',
            //'created_by',
            //'updated_by',
            //'purchase_number',
            //'product',
           // 'tax',
            [
                'attribute'=>'tax',
                'value'=>function($model)
                {
                    return $model->tax.'%';
                }
            ],
            //'ACCOUNT',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PurchaseDetails $model, $key, $index, $column) {
                    return Url::toRoute(['/purchase-details/'.$action ,'id' => $model->id]);
                 }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                
                'template' => '{vprint}',
                    
                'buttons' => [
                    'vprint' => function ($url, $model, $key) {
                        $delivery= PurchaseDetails::find()->where(['purchase_number'=>$model->purchase_number])->count();
                        if($delivery==0)
                        {
                        return Html::a('<button class="btn btn-warning pull-right" id="modalButton"><i>Delivery</i></button>',['/in-stock/create', 'purchase_number'=>$model->purchase_numbert]
                        ,
                    );}
                        
                        
                    },
    
                ],
              ],
              [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {reception}', // Add the {reception} button
                'buttons' => [
                    'reception' => function ($url, $model, $key) {
                        return $model->received ? '' : Html::a('<span class="glyphicon glyphicon-check"></span>', ['/stock-histories/create', 'product' => $model->id], [
                            'title' => Yii::t('app', 'Product Reception'),
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to receive this product?'),
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],

       ],
    ]); ?>

    <table class="table table-bordered">
        
        <tbody>
            <!-- You may need to adjust the logic below based on your requirements -->
            <tbody>
        <!-- Your data rows go here -->
        <tr>
            <td>Sub Total</td>
            
            <td>$50.00</td>
        </tr>
        <tr>
            <td>Tax</td>
          
            <td>$30.00</td>
        </tr>
        <tr>
            <td>Total</td>
            
            <td>$30.00</td>
        </tr>
        
    </tbody>
    <tfoot>
        </tbody>
    </table>

</div>
<br><br><br><br><br><br><br><br><br>