<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\api\modules\v1\models\EstmateDetails;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\api\modules\v1\models\SearchEstmates */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Estmates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estmates-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'New Estimate'), ['create'], ['class' => 'btn btn-info pull-right']) ?>
    </p>

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
            //'expiration_date',
			  'discount',
			  [
                'attribute' =>  'Amount',
				'label'=>'Amount',
				'format'=>'integer',
                'value' => function ($model) {
					$sum=0;
					$items=EstmateDetails::find()->where(['estimate'=>$model->no])->all();
					if(!empty($items))
					{
						foreach($items as $item)
						{
							$sum=$sum+($item->price*$item->quantity);
						}
						
					}
                    return $sum;
                }
            ],
            'status',
          
            'created_at:date',
            //'updated_at',
            //'memo',
            //'created_by',
            //'updated_by',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
