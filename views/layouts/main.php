<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
use lajax\languagepicker\widgets\LanguagePicker;
$bundle = yiister\gentelella\assets\Asset::register($this);
$user = Yii::$app->user->identity;
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
    <!-- HTML5 shim and Respond.js for IE8 GGGG support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-md">
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="/garage/web/" class="site_title"> <span>HOME</span></a>
		    
                </div>
                <div class="clearfix"></div> 

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>System Menu</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
									
                                    ["label" => "Home", "url" => ["/"], "icon" => "home",],
									
                                    [
                                        'label' => Yii::t('app', 'Purchase Orders'),
                                        'icon' => 'tags',
                                        'url' => "#",
                                        'items' => [
                                            ["label" =>  Yii::t('app', 'New order'), "url" => ['/purchase-orders/create']],
                                            ['label' =>  Yii::t('app', 'All orders'), 'url' => ['/purchase-orders/index']],
                                            // ["label" =>  Yii::t('app', 'Import cards'), "url" => ['/cards/create']],
                                            // ['label' =>  Yii::t('app', 'Distribute Cards'), 'url' => ['/agent-cards-distributions/distribute']],
                                        ],
                                    ],
                                    [
                                        'label' => Yii::t('app', 'Post On Sale'),
                                        'icon' => 'shopping-cart',
                                        'url' => "#",
                                        'items' => [
                                            ["label" =>  Yii::t('app', 'New Sale'), "url" => ['/inventory-sales/create']],
                                            ['label' =>  Yii::t('app', 'All Sales'), 'url' => ['/inventory-sales/index']],
                                           
                                        ],
                                    ],
                                
                                       
                                    ['label' => Yii::t('app', 'Reports'), 'url' => ['/reports'],'icon' => 'pie-chart'],
                                    ['label' => Yii::t('app', 'Business Setup'), 'url' => ['/site/business-setup'],'icon' => 'cog'],

                                    

                                    

                                    
                                    
                                    
                                     
                                       
                                        
									
//====================================================================================================================================================
						                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
					
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                               <?= Yii::$app->user->identity->name ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><?= Html::a('Profile', ['/staffs/profile']) ?></li>
                                <li>
								<?= Html::a(
                                            Yii::t('app', 'Logout') . ' <i class="fa fa-sign-out pull-right"></i>',
                                            ['/site/logout'],
                                            ['data-method' => 'post']
                                        ) ?></li>
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
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
