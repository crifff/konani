<?php
class ProgramCommand extends CConsoleCommand
{
  public function run($args) {
    echo "hoge";
    $m = new Mongo("mongodb://localhost");
    $db=$m->test;
    $collection=$db->programs;
    $data=json_decode(file_get_contents('http://cal.syoboi.jp/rss2.php?alt=json&days=14&count=1000&start=201206010000'));
    foreach($data->items as $r){
      $collection->insert($r);
    }
  }
}
