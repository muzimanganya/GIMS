<?php

use app\models\AccountCategories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AccountCategoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Account Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New Account Category'), ['create'], ['class' => 'btn btn-success pull-right']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            'name',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            //'updated_by',
            [
                'attribute'=>'type',
                'value'=>function($model)
                {
                    return $model->type0->name;
                }
            ],
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AccountCategories $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'code' => $model->code]);
                 }
            ],
        ],
    ]); ?>


</div>
