<?php

use app\models\ProductBrands;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductBrandsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Product Brands');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-brands-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New Brand'), ['create'], ['class' => 'btn btn-primary pull-right']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'NAME',
            'description',
            'created_at:date',
            //'updated_at',
            //'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductBrands $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
