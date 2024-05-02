
<?php

use yii\widgets\Breadcrumbs;

use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

// Assuming you have a model named 'Bank' to handle the data
$dataProvider = new ActiveDataProvider([
    'query' => \app\models\BankAccounts::find(),
]);
?>

<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <?php $form = ActiveForm::begin([
            'id' => 'w0',
            'class' => 'form-vertical kv-form-bs3',
            'action' => ['/site/index'],
            'method' => 'GET',
            'options' => ['autocomplete' => 'off'],
        ]); ?>

        <div class='row'>
            
        <div class='col-md-4'>
        <?= $form->field($model, 'start')->widget(\yii\jui\DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ])->label(false) ?>
    
</div>

       

            <div class='col-md-4'>
            <?= $form->field($model, 'end')->widget(\yii\jui\DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ])->label(false) ?>
</div>

            <div class='col-md-4' style="padding-top: 0px; text-align: right;">
                <?= Html::submitButton('Apply Filter', ['class' => 'btn btn-default btn-block']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class='row'>
    <div class='col-md-6'>
        <div class='row'>
            <div class='col-md-6'>
                <div class='panel panel-default'>
                    <div class='panel-body'>
                        <div class='top_tiles'>
                            <div class='tile'>
                                <span>Profit Before Income Tax</span>
                                <h2>16,844,116</h2>
                                Expenses <span class='red h6'>4,396,031</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class='col-md-6'>
                <div class='panel panel-default'>
                    <div class='panel-body'>
                        <div class='top_tiles'>
                            <div class='tile'>
                                <span>Sales Taxed Revenue</span>
                                <h2>21,240,147</h2>
                                Sales Tax <span class='green h6'>3,038,802</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>Profit Trends<small class="red h6">Current Year</small></h2>
                <div class='clearfix'></div>
            </div>
            <div class="x_content">
                <canvas id="w1"></canvas>            </div>
        </div>
    </div>

    <div class='col-md-6'>
        <div class='row'>
            <div class='col-md-6'>
                <div class='panel panel-default'>
                    <div class='panel-body'>
                        <div class='top_tiles'>
                            <div class='tile'>
                                <span>Unpaid Invoices</span>
                                <h2>2,713,995</h2>
                                Overdue <span class='red h6'>2,258,995</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class='col-md-6'>
                <div class='panel panel-default'>
                    <div class='panel-body'>
                        <div class='top_tiles'>
                            <div class='tile'>
                                <span>Unpaid Bills</span>
                                <h2>11,948,170</h2>
                                Overdue <span class='red h6'>11,948,170</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>Revenue and Expenditure<small class="red h6">Current Year</small></h2>
                <div class='clearfix'></div>
            </div>
            <div class="x_content">
                <canvas id="w2"></canvas>            </div>
        </div>
    </div>
</div>


<div class='row'>
    <div class='col-md-6'>
        <div class='panel panel-default'>
            <div class='panel-body'>
                <div class="chart-container" style="position: relative; height:360px;">
                    <h3>Top 5 Expenses</h3>
                    <canvas id="w3"></canvas>                </div><br>
            </div>
        </div>
    </div>

    <div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <div style="height:360px;">
                <h3>Pinned Bank Accounts</h3>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'attribute' => 'NAME', // Assuming 'name' is the attribute for Bank Name
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::a($model->name, ['/accounting/banks/view', 'id' => $model->id], ['class' => 'h5']);
                            },
                        ],
                        'account_number',
                        'balance',
                    ],
                    'options' => [
                        'class' => 'grid-view is-bs3 kv-grid-bs3 hide-resize',
                        'id' => 'w4',
                        'data-krajee-grid' => 'kvGridInit_c444ab83',
                        'data-krajee-ps' => 'ps_w4_container',
                    ],
                ]); ?>
            </div>
        </div>
        <br>
    </div>
</div>
    </div>
</div><br>
                </div>
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <footer>
                <div class="text-center">
                    <!--Adiuta Business Assistant. < ?= Yii::t('app', 'Copyright {y}, Hosanna Higher Technologies Co. Ltd.', ['y' => date('Y')]) ?-->
                    Copyright 2024              </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>

    </div>