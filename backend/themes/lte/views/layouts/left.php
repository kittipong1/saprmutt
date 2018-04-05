<?php 
use yii\helpers\Url;
if(Yii::$app->user->isGuest){
   header('Location:'.Url::to(['login']));
   exit();
}
 ?>
}

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://www.thepixelfarm.co.uk/wp-content/uploads/2016/05/admin_v01D_support.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Admin</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Same tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                    [
                        'label' => 'จัดการ User',
                        'url' => '#',
                        'items' => [
                            ['label' => 'เพิ่ม User', 'icon' => 'plus', 'url' => ['/usermanager/create'],],
                            ['label' => 'รายการ User ', 'icon' => 'book', 'url' => ['/usermanager/index'],],
],],
//                     [
//                         'label' => 'การจัดการ VDO',
//                         'icon' => 'video-camera',
//                         'url' => '#',
//                         'items' => [
//                             ['label' => 'เพิ่ม VDO', 'icon' => 'plus', 'url' => ['/vdo/create'],],
//                             ['label' => 'รายการ VDO ', 'icon' => 'book', 'url' => ['/vdo/index'],],
// ],
//             ],['label' => 'ประเภทคลัง VDO', 'icon' => 'file-video-o', 'url' => ['/storevdo']],
//              [
//                         'label' => 'การจัดการข่าวสาร',
//                         'icon' => 'newspaper-o',
//                         'url' => '#',
//                         'items' => [
//                             ['label' => 'เพิ่มข่าวสาร', 'icon' => 'plus', 'url' => ['/news/create'],],
//                             ['label' => 'รายการข่าวสาร ', 'icon' => 'book', 'url' => ['/news/index'],],
// ],
            
//             ],
//             ['label' => 'ประเภทข่าวสาร', 'icon' => 'clipboard', 'url' => ['/news_type']],
            
//              [
//                         'label' => 'การจัดการรูปอัลบัมรูปภาพ',
//                         'icon' => 'image',
//                         'url' => '#',
//                         'items' => [
//                             ['label' => 'เพิ่มรูปภาพ', 'icon' => 'plus', 'url' => ['/image/create'],],
//                             ['label' => 'รายการอัลบัมรูปภาพ ', 'icon' => 'book', 'url' => ['/image/index'],],
// ],
            
//             ],
//             ['label' => 'ปรเภทคลังอัลบัมรูปภาพ', 'icon' => 'file-image-o', 'url' => ['/album']],

            [
                        'label' => 'การจัดการเกี่ยวกับเรา',
                        'icon' => 'file-text-o',
                        'url' => '#',
                        'items' => [
                            // ['label' => 'เพิ่มเกี่ยวกับเรา', 'icon' => 'plus', 'url' => ['/about/create'],],
                            ['label' => 'รายการเกี่ยวกับเรา ', 'icon' => 'book', 'url' => ['/about/index'],],
],
            
            ],

            [
                        'label' => 'การจัดการเกี่ยวกับ banner',
                       
                        'url' => '#',
                        'items' => [
                            ['label' => 'เพิ่ม banner', 'icon' => 'plus', 'url' => ['/banner/create'],],
                            ['label' => 'รายการ banner ', 'icon' => 'book', 'url' => ['/banner/index'],],
],
            
            ],

            ]
            ]
        ) ?>

    </section>

</aside>
