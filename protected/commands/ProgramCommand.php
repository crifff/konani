<?php
class ProgramCommand extends CConsoleCommand
{
  public function run($args) {
    $data=json_decode(file_get_contents('http://cal.syoboi.jp/rss2.php?alt=json&days=14&count=1000&'));
    foreach($data->items as $r){
      $program = Program::model()->findByAttributes(array('PID'=>$r->PID));

      if(!$program)
      {
        $program = new Program;
        $program->attributes=(array)$r;
        $program->save();
        //echo 'save '.$program->Title."\n";
      }
      else
      {
        $program->attributes=(array)$r;
        $program->update(array_keys($program->attributes),true);
        //echo 'update '.$program->Title."\n";
      }
      $series = Series::model()->findByAttributes(array('TID'=>$r->TID));
      if(!$series)
      {
        $pData=simplexml_load_file(
          sprintf('http://cal.syoboi.jp/db.php?TID=%d&Command=TitleLookup',$r->TID)
        );
        $series=new Series;
        $json=((array)$pData->TitleItems->TitleItem);
        $series->attributes=$json;
        $series->save();
        echo 'save Series '.$series->Title."\n";
      }
    }
  }
}
