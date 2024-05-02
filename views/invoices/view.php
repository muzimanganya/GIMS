 <head>
    <style>
    {
        box-sizing: border-box;
    }
    /* Set additional styling options for the columns*/
    .column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }

    .badge {
  padding: 1px 9px 2px;
  font-size: 12.025px;
  font-weight: bold;
  white-space: nowrap;
  color: #ffffff;
  background-color: #999999;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}
.badge:hover {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
}
.badge-error {
  background-color: #b94a48;
}
.badge-error:hover {
  background-color: #953b39;
}
.badge-warning {
  background-color: #f89406;
}
.badge-warning:hover {
  background-color: #c67605;
}
.badge-success {
  background-color: #468847;
}
.badge-success:hover {
  background-color: #356635;
}
.badge-info {
  background-color: #3a87ad;
}
.badge-info:hover {
  background-color: #2d6987;
}
.badge-inverse {
  background-color: #333333;
}
.badge-inverse:hover {
  background-color: #1a1a1a;
}
    </style>
 </head>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\api\modules\v1\models\Invoices */

$this->title = $model->no;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Invoices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="invoices-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
          <?= Html::a(Yii::t('app', 'Update'), ['update', 'no' => $model->no], ['class' => 'btn btn-dark']) ?>
          <?= Html::a(Yii::t('app', 'Confirm'), ['confirm', 'no' => $model->no], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to Confirm this invoice?'),
                'method' => 'post',
            ],
        ]) ?>
          <?= Html::a(Yii::t('app', 'Receive Payment'), ['/invoice-payments/create', 'invoice' => $model->no], ['class' => 'btn btn-info']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['cancel', 'no' => $model->no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to Cancel this invoice?'),
                'method' => 'post',
            ],
        ]) ?>
         <?= Html::a(Yii::t('app', 'Add item'), ['/invoice-details/create', 'no' => $model->no], ['class' => 'btn btn-success pull-right']) ?>

          <?= Html::a(Yii::t('app', 'Print'), ['print', 'no' => $model->no], ['class' => 'btn btn-warning']) ?>
    </p>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no',
            'idate',
            
            [
                'label'=>'Customer',
                'value'=>function($model)
                {
                    return $model->customer0->name;
                }
            ],
            
               
            'payment_due',
            'discount:boolean',
            'memo',
            ['attribute'=>'status','value'=>(
                ($model->status ==0) ? 
                    '<span class="badge badge-warning">Pending</span>':

                (($model->status ==1)? 
                    '<span class="badge badge-info">Confirmed</span>' :
                   


                '<span class="badge badge-error">cancelled</span>')),
            'format'=>'html']
           
          
        ],
    ]) ?>
    
    <?= GridView::widget([
        'dataProvider' => $items,
        'layout' => '{items}',
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'item',
            'quantity',
            'price',
            'currency',
            //'created_at',
            //'updated_at',
            //'reconciled',
           
            //'invoice',
            //'created_by',
            //'updated_by',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<body>
    <div class="row">
        <div class="column">
            <h2></h2>
            <p></p>
        </div>
        <?php
            $posts = Yii::$app->db->createCommand('SELECT FORMAT(sum(price*quantity),0) as total, FORMAT(sum(price*quantity)/100*18,0) as vat,format(sum(price*quantity)+sum(price*quantity)/100*18,0) as gtotal FROM invoice_details where invoice=:no')
            ->bindValue(':no',$_REQUEST['id'])
            ->queryOne();
        ?>
        <div class="column">
            <?= DetailView::widget([
        'model' => $posts,
        'attributes' => [
            'total',
            [
                'label'=>'TVA(18%)',
                'attribute'=>'vat'
            ],

            [
                'label'=>'Grand Total',
                'attribute'=>'gtotal'
            ],

          
        ],
    ]) ?>
        </div>
    </div>
    
 </body