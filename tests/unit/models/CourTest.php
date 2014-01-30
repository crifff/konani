<?php

namespace tests\unit\models;

use app\models\Cour;
use yii\codeception\TestCase;

class CourTest extends TestCase
{
    /** @var Cour */
    private $model;

    protected function setUp()
    {
        parent::setUp();
        $this->model = new Cour();
    }

    public function testCurrentSeason()
    {
        $result = $this->model->currentSeason();
        expect('winter', $result);
    }
}
