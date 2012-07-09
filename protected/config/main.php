<?php
require_once dirname(__FILE__).'/../../../../.konani';
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'今期のアニメ ver.α',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.helpers.*',
		'ext.YiiMongoDbSuite14.*',
		'ext.TwitterExtension4Yii.*',
		'ext.TwitterExtension4Yii.lib.*',
		'ext.EMongoDbHttpSession.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'hogehoge',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
      'generatorPaths'=>array(
        'application.extensions.YiiMongoDbSuite14.gii'
      ),
		),
	),

	// application components
	'components'=>array(
    'user'=>array(
      // enable cookie-based authentication
      'allowAutoLogin'=>true,
    ),
    // uncomment the following to enable URLs in path-format
    'urlManager'=>array(
      'urlFormat'=>'path',
      'showScriptName'=>false,
      'caseSensitive'=>false,  
      'rules'=>array(
        '/'=>'site/index',
        'season/<year:\d*>/<season:(winter|spring|summer|autumn)>'=>'cour/index',
        'season/<season:(winter|spring|summer|autumn|next|current)>'=>'cour/index',
        'user/<id:\w+>/checklist'=>'user/checklist',
        'user/<id:\w+>'=>'user/view',
        '<controller:\w+>/'=>'<controller>/index',
        '<controller:\w+>/<action:\w+>/<id:\w+>'=>'<controller>/<action>',
        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        '<controller:\w+>/<id:\w+>'=>'<controller>/view',
      ),
    ),
    'mongodb' => array(
      'class'            => 'EMongoDB',
      'connectionString' => 'mongodb://localhost',
      'dbName'           => 'konani',
      'fsyncFlag'        => true,
      'safeFlag'         => true,
      'useCursor'        => false
    ),
    'session'=>array(
      'class'=>'ext.EMongoDbHttpSession.EMongoDbHttpSession',
      'timeout'=>60*60*24*7,
    ),
    'errorHandler'=>array(
      // use 'site/error' action to display errors
      'errorAction'=>'site/error',
    ),
    'log'=>array(
      'class'=>'CLogRouter',
      'routes'=>array(
        array(
          'class'=>'ext.EMongoDbLogRoute.EMongoDbLogRoute',
          'levels'=>'info, error, warning',
          //初回だけ実行させる
          //'installCappedCollection' => true,
        ),
      ),
    ),
    'request'=> array(
      'enableCsrfValidation'=>true
    ),
  ),

  // application-level parameters that can be accessed
  // using Yii::app()->params['paramName']
  'params'=>array(
    // this is used in contact page
    'adminEmail'=>'webmaster@example.com',
  ),
);
