<?php

return [
//    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
//    'username' => 'root',
//    'password' => '',
//    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',

    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=yii2advanced',
    'username' => 'postgres',
    'password' => 'postgres',
    'charset' => 'utf8',
//    'schemaMap' => [
//        'pgsql' => [
//            'class' => 'yii\db\pgsql\Schema',
//            'defaultSchema' => 'utility'
//        ]
//    ],
//    // фреймворк кеширует структуру таблицы
//    'enableSchemaCache' => true,
//    // Продолжительность кеширования схемы.
//    'schemaCacheDuration' => 3600,
//    // Название компонента кеша, используемого для хранения информации о схеме
//    'schemaCache' => 'cache',
];
