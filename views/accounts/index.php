<?php
use yii\bootstrap\Tabs;
use yii\helpers\Html;

$this->title = 'Chart of Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">
<p>
<?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New Account'), ['create'], ['class' => 'btn btn-primary pull-right']) ?>

    </p>
    <br>
    <?php
    echo Tabs::widget([
        'items' => array_map(function ($type, $accounts) {
            return [
                'label' => Html::encode($type->name),
                'content' => $this->render('_tab_content', ['accounts' => $accounts]),
            ];
        }, $types, $accountsByType),
    ]);
    ?>
</div>
