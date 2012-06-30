<?php

return CMap::mergeArray(
  require(dirname(__FILE__).'/main.php'),
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
      'mongodb' => array(
        'dbName'           => 'test',
      ),
    ),
  )
);
