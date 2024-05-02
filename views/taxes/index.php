<?php

use app\models\Taxes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TaxesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Taxes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taxes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New Tax'), ['create'], ['class' => 'btn btn-primary pull-right']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NAME',
            //'percent',
            [
                'attribute'=>'percent',
                'value'=>function($model)
                {
                    return $model->percent.'%';
                }
            ],
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Taxes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'percent' => $model->percent]);
                 }
            ],
        ],
    ]); ?>


</div>
