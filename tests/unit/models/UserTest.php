<?php

namespace tests\unit\models;

use yii\codeception\TestCase;

class UserTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        // uncomment the following to load fixtures for table tbl_user
        //$this->loadFixtures(['tbl_user']);
    }

    public function testHoge()
    {
        expect(1, 1);
    }
    // TODO add test methods here
}
