<?php

use app\models\Currencies;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CurrenciesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Currencies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currencies-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New Currency'), ['create'], ['class' => 'btn btn-primary pull-right']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CODE',
            'NAME',
            // 'created_at',
            // 'updated_at',
            'symbol',
            //'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Currencies $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'CODE' => $model->CODE]);
                 }
            ],
        ],
    ]); ?>


</div>
