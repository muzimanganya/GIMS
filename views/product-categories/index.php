<?php

use app\models\ProductCategories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductCategoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Product Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New Category'), ['create'], ['class' => 'btn btn-primary pull-right']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NAME',
            'description',
            'is_active:boolean',
            //'created_at',
            //'updated_at',
            //'id',
            //'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductCategories $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
