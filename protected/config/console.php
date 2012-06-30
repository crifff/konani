<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return CMap::mergeArray(
  require(dirname(__FILE__).(getenv('YII_ENVIRONMENT')==='DEVELOP'?'/test.php':'/main.php')),
  array(
    'components'=>array(
      'log'=>array(
        'class'=>'CLogRouter',
        'routes'=>array(
          array(
            'class'=>'CWebLogRoute',
          ),
        ),
      ),
    )
  )
);
