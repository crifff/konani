<?php
/** @var $scenario Codeception\Scenario */

$I = new WebGuy($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage(Yii::$app->homeUrl);
$I->see('Congratulations');
$I->seeLink('今日のアニメ');
$I->click('今日のアニメ');
$I->see('今日のアニメ');
