<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\api\modules\v1\models\BillDetails;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\api\modules\v1\models\SearchBills */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bills');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bills-index">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no',
			'purchase_order',
			[
                'attribute' =>  'purchase_order',
				'label'=>'Supplier',
                'value' => function ($model) {
                    return $model->purchaseOrder->supplier0->name ?? Yii::t('app', 'Not assigned');
                }
            ],
             [
                
                'label' => 'Amount',
                'format'=>'decimal',
                'value' => function ($model) {
                    
                    return BillDetails::find()->where(['bill'=>$model->no])->sum('price*quantity');
                }
            ],
            'created_at:date',
            //'updated_at',
            'memo',
			
			
            [

    'attribute' => 'status',

    

    'contentOptions'=>function($model, $key, $index, $column) { 

        if($model->status == 1)

            return ['style' => 'color:green'];  

        if($model->status == 0)

            return ['style' => 'color:red'];  
        return ['style' => 'bgcolor:yellow']; 

     },

     'value'=>function($model) { 

         if($model->status ==0)

             return 'Pending';

         elseif($model->status ==1)

             return 'Paid';

         else

             return 'Payable';

     },

],
            //'bill_document',
            //'created_by',
            //'updated_by',
           

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{check-seating}',
                'buttons' => [
                    'check-seating' => function ($url, $model, $key){
                        if($model->status<>1)
                        return Html::a('<button class="btn btn-success">Pay bill</i></button>',['bill-payments/create', 'bill'=>$model->no,'order'=>$model->purchase_order]
                        , 
                        [
                            'class'=>'user-route'
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
