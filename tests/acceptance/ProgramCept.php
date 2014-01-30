<?php
/** @var $scenario Codeception\Scenario */

use tests\_pages\ProgramPage;

$I = new WebGuy($scenario);
$I->wantTo('ensure that about works');
ProgramPage::openBy($I);
$I->see('今日のアニメ', 'h1');
