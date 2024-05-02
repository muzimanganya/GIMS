<?php

use app\modules\api\modules\v1\models\Branch;
use app\modules\api\modules\v1\models\InvoiceDetails;
use app\modules\api\modules\v1\models\InvoicePayments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
//use app\modules\api\models\Invoices;
use app\modules\api\modules\v1\models\Invoices;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchInvoices */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Invoices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoices-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'New Invoice'), ['create'], ['class' => 'btn btn-primary pull-right']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no',
            'idate',
            [
                'label'=>'Customer',
                'value'=>function($model)
                {
                    return $model->customer0->name;
                }
            ],
            [
                'label'=>'Branch',
                'value'=>function($model)
                {
                    return Branch::find()->where(['id'=>$model->branch])->one()->name;
                }
            ],
            [
                'label'=> Yii::t('app', 'Amount'),
                'format'=>'integer',
                'value'=>function($model)
                {
                    $items=InvoiceDetails::find()->where(['invoice'=>$model->no])->all();
                    $amount=0;
                    if(!empty($items))
                    {
                        foreach($items as $item)
                        {
                            $amount=$amount+($item->price*$item->quantity);
                        }
                        $amount=$amount+($amount/100*18);
                        
                    }
                    return $amount;
                }
                

            ],
            [
                'label'=> Yii::t('app', 'Paid'),
                'format'=>'integer',
                'value'=>function($model)
                {
                    
                    $items=InvoicePayments::find()->where(['invoice'=>$model->no])->all();
                    $amount=0;
                    if(!empty($items))
                    {
                        foreach($items as $item)
                        {
                            $amount=$amount+$item->amount;
                        }
                        
                        
                    }
                    return $amount;
                }
                

            ],
            [
                'label'=> Yii::t('app', 'Remain'),
                'format'=>'integer',
                'value'=>function($model)
                {
                    $items=InvoiceDetails::find()->where(['invoice'=>$model->no])->all();
                    $amount=0;
                    if(!empty($items))
                    {
                        foreach($items as $item)
                        {
                            $amount=$amount+($item->price*$item->quantity);
                        }
                        $amount=$amount+($amount/100*18);
                        
                    }

                    $payments=InvoicePayments::find()->where(['invoice'=>$model->no])->all();
                    $pamount=0;
                    if(!empty($payments))
                    {
                        foreach($payments as $item)
                        {
                            $pamount=$pamount+$item->amount;
                        }
                        
                        
                    }
                    return $amount-$pamount;
                }
                

            ],
            'discount:boolean',
            'memo',
            'status',
            'payment_due',
            'reconcile:boolean',
            //'created_at',
            //'updated_at',
            //'customer',
            //'created_by',
            //'updated_by',
           //'branch',
           
            //'idate',
            //'currency',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{vprint}',
                'buttons' => [
                    'vprint' => function ($url, $model, $key) {
                        //if($model->part_fixed ==1 ||  $model->is_painting==1 || $model->serviceOnly($model->no)){
                        return Html::a('<button class="btn btn-success">Details</i></button>',['view','id'=>$model->no]
                        ,
                        [
                            'class'=>'user-route'
                        ]);
                        //}
                        
                    },

                ],
            ],
        ],
    ]); ?>


</div>
