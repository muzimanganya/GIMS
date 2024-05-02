<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use app\models\User;
use app\widgets\Alert;
use lajax\languagepicker\widgets\LanguagePicker;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$bundle = yiister\gentelella\assets\Asset::register($this);
$user = Yii::$app->user->identity;
$this->registerCss('
    .nav-md .container.body .right_col{
        min-height:100vh !important; 
    }
');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>">
    <?php $this->beginBody(); ?>
    <div class="container body">

        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="/images/logo.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span></span>
                            <h2></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h2><?= Yii::t('app', 'FINLAP') ?></h2>
                            <?= \yiister\gentelella\widgets\Menu::widget(
                                [
                                    "items" => [
									["label" => "Home", "url" => ["/"], "icon" => "home",],
									 ["label" => "Dashboard", "url" => ["/site/dashboard"], "icon" => "home", 'visible'=>$user->isAgent(),],
									 
                                       //['label' => Yii::t('app', 'Home'), 'url' => ['/site/index'], 'icon' => 'home'],

                                        
										['label' => Yii::t('app', 'Reports'), 'url' => ['/reports'], 'icon' => 'pie-chart'],

										['label' => Yii::t('app', 'Transactions'), 'url' => ['/transaction'], 'icon' => 'credit-card', 'visible'=>$user->isAgent(),],

                                        ['label' => Yii::t('app', 'Revenues'), 'url' => ['/revenue'], 'icon' => 'money', 'visible'=>$user->isAdmin(),],

                                        
                                        [
                                            'label' => Yii::t('app', 'Settings'),
                                            'icon' => 'cog',
                                            'url' => "#",
											'visible'=>$user->isAdmin(),
                                            'items' => [
												['label' =>  Yii::t('app', 'Vehicles'), 'url' => ['/vehicle']],
                                                ['label' =>  Yii::t('app', 'Drivers'), 'url' => ['/driver']],
												['label' =>  Yii::t('app', 'Stations'), 'url' => ['/station']],
                                                ['label' =>  Yii::t('app', 'Pricings'), 'url' => ['/pricing']],
                                                ['label' =>  Yii::t('app', 'Fuel types'), 'url' => ['/fueltype']],
												['label' =>  Yii::t('app', 'Users'), 'url' => ['/users']],
                                                
                                               
                                            ],
                                        ],
                                    ],
									
                                ]
                            ) ?>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="javascript:;" class="user-profile">
                                    <?= LanguagePicker::widget([
                                        'skin' => LanguagePicker::SKIN_BUTTON,
                                        'size' => LanguagePicker::SIZE_LARGE
                                    ]); ?>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?= Yii::$app->user->identity->name ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <?= Html::a(
                                            Yii::t('app', 'Logout') . ' <i class="fa fa-sign-out pull-right"></i>',
                                            ['/site/logout'],
                                            ['data-method' => 'post']
                                        ) ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?><br>
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <footer>
                <?= Yii::t('app', 'Copyright {y}, LAP Ltd. All rights reserved.', ['y' => date('Y')]) ?>
            </footer>
            <!-- /footer content -->
        </div>

    </div>

    <!-- /footer content -->
    <?php $this->endBody(); ?>
</body>

</html>
<?php $this->endPage(); ?>