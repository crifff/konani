<?php
Yii::import('ext.YiiMongoDbSuite.test.EMongoDbTestCase');
class UserTest extends EMongoDbTestCase
{
  public function testSearchUser()
  {
    $user = User::model()->findByAttributes(array('twitter_id'=>'crifff'));
    $this->assertEquals('crifff',$user->nickname);
  }


  public function testCheckTID()
  {
    $user = User::model()->findByAttributes(array('twitter_id'=>'crifff'));
    $user->check(2574);
    $this->assertTrue($user->isChecked(2574));
  }

  public function testNoCheckTID()
  {
    $user = User::model()->findByAttributes(array('twitter_id'=>'crifff'));
    $this->assertFalse($user->isChecked(2575));
  }
}
