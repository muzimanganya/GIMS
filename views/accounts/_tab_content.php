<?php
use yii\grid\GridView;
use yii\helpers\Html;

echo GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $accounts]),
    'layout' => '{items}{summary}{pager}',
    'columns' => [
        // Customize columns based on your Account model attributes
        'CODE',
        'NAME',
        [
            'attribute'=>'category',
            'value'=>function($model)
            {
                return $model->category0->name;
            }
        ],
        //'category',
        [
            'attribute'=>'TYPE',
            'value'=>function($model)
            {
                return $model->type0->name;
            }
        ],
        //'TYPE',
        // Add more columns as needed
    ],
]);



