<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\api\modules\v1\models\SearchCard */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cards in Stock');
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => Yii::t('app', 'Showing {begin}-{end} of {totalCount} Cards'),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'label',
            [
                'attribute' =>  'created_by',
                'value' => function ($model) {
                    return $model->createdBy->name;
                }
            ],
            'created_at:datetime',
        ],
    ]); ?>
