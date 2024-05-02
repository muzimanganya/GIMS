<?php

use app\models\BankAccounts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BankAccountsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Bank Accounts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-accounts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bank Accounts'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NAME',
            'account_number',
            'on_dashboard',
            'restricted',
            'balance',
            //'created_by',
            //'updated_by',
            //'currency',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BankAccounts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'NAME' => $model->NAME]);
                 }
            ],
        ],
    ]); ?>


</div>
