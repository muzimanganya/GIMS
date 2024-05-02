<?php

use yii\helpers\Html;
use app\components\SumProviderRows;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Agent cards stock');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">


<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => null,
        'layout' => '{items}{summary}{pager}',
        'showFooter'=>true, 
        'footerRowOptions'=>['style'=>'font-weight:bold;font-size: 16px;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			 
           [
                'attribute'=>'seller_name',
				'label'=>'Agent',
                'format'=>'html',
                
				
            ],
			[
                'attribute'=>'amount',
                'label'=>Yii::t('app', 'Amount'),
				'format'=>'integer',
               // 'footer'=>SumProviderRows::total($dataProvider, 'sales')
            ],
			
            
            
        ],
    ]); ?>
</div>


