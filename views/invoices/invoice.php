<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\api\modules\v1\models\SearchInvoices */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Invoices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoices-index">

    
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no',
			[
                'attribute' =>  'customer',
				'label'=>'Customer',
                'value' => function ($model) {
                    return $model->customer0->name ?? Yii::t('app', 'Not assigned');
                }
            ],
           // 'discount',
            'memo',
           // 'status',
            //'payment_due',
            //'created_at',
            //'updated_at',
            
            //'created_by',
            //'updated_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{check-seating}',
                'buttons' => [
                    'check-seating' => function ($url, $model, $key){
                        return Html::a('<button class="btn btn-success">Add payment</i></button>',['invoice-payments/create','invoice'=>$model->no]
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
