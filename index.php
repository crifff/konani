<?php
$yii=dirname(__FILE__).'/yii/framework/yii.php';

if(getenv('YII_ENVIRONMENT')==='production')
{
  $config=dirname(__FILE__).'/protected/config/main.php';
}
else
{
  $config=dirname(__FILE__).'/protected/config/test.php';
  defined('YII_DEBUG') or define('YII_DEBUG',true);
  defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
}

require_once($yii);
Yii::createWebApplication($config)->run();
