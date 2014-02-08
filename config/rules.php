<?php
return [
    'program/<date:[-0-9]+>' => 'program/index',
    'series/<year:\d+>/<season:\w+>' => 'series/index',
    'user/<username:\w+>/<date:[-0-9]+>' => 'user/index',
    'user/<username:\w+>' => 'user/index',
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
];