<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => 'ADMIN',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

    ],
    'aliases' => [
        '@uploads'=>'@appRoot/uploads',
        '@module'=>'@common/modules',
        '@site'=>dirname(dirname(dirname(__DIR__)))
    ],
];
