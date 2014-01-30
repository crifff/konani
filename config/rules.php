<?php
return [
    'program/<date:[-0-9]+>' => 'program/index',
    'series/<year:\d+>/<season:\w+>' => 'series/index',
    'user/<username:\w+>' => 'user/index',
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
];