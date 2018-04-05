<?php
use yii\helpers\Html;
use app\models\User;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                
                  
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu" style="width: 171.5px;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="http://www.thepixelfarm.co.uk/wp-content/uploads/2016/05/admin_v01D_support.png" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"> ADMIN </span>
                    </a>
                    <ul class="dropdown-menu" style="width: auto">
                        <!-- User image -->
                      
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer" >
                            
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat' , 'style'=>'width:150px;']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
               
            </ul>
        </div>
    </nav>
</header>
