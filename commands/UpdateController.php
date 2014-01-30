<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Program;
use app\models\Channel;
use app\models\Title;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UpdateController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {
        $start = date('YmdHi');

        $url = 'http://cal.syoboi.jp/rss2.php?alt=json&days=7&titlefmt=%24(SubTitleB)%5D&start=' . $start;
        $data = json_decode(file_get_contents($url));
        echo 'download ' . $url . PHP_EOL;
        foreach ($data->items as $record) {
            $channel = Channel::find(['id' => $record->ChID]);
            if (!$channel) {
                $channel = $this->saveChannel($record);
            }
            $title = Title::find(['id' => $record->TID]);
            if (!$title) {
                $title = $this->saveTitle($record);
            }
            $program = Program::find(['id' => $record->PID]);
            if (!$program) {
                $this->saveProgram($record, $title, $channel);
            }
        }
    }

    /**
     * @param $record
     * @return Title
     */
    public function saveTitle($record)
    {
        $url = sprintf('http://cal.syoboi.jp/db.php?TID=%d&Command=TitleLookup', $record->TID);
        echo $url . PHP_EOL;
        $xml = simplexml_load_file($url);
        $titleData = ((array)$xml->TitleItems->TitleItem);
        $title = new Title();
        $title->id = $titleData['TID'] ? : '';
        $title->urls = $record->Urls ? : '';
        $title->title = $titleData['Title'] ? : '';
        $title->short_title = $titleData['ShortTitle'] ? : '';
        $title->title_kana = $titleData['TitleYomi'] ? : '';
        $title->title_english = $titleData['TitleEN'] ? : '';
        $title->comment = $titleData['Comment'] ? : '';
        $title->category = $titleData['Cat'] ? : 0;
        $title->title_flag = $titleData['TitleFlag'] ? : 0;
        $title->first_year = $titleData['FirstYear'] ? : '';
        $title->first_month = $titleData['FirstMonth'] ? : '';
        $title->first_end_year = $titleData['FirstEndYear'] ? : '';
        $title->first_end_month = $titleData['FirstEndMonth'] ? : '';
        $title->first_channel = $titleData['FirstCh'] ? : '';
        $title->keywords = $titleData['Keywords'] ? : '';
        $title->sub_titles = $titleData['SubTitles'] ? : '';
        $title->save();
        return $title;
    }

    private function saveChannel($record)
    {
        $channel = new Channel();
        $channel->id = $record->ChID;
        $channel->group_id = $record->ChGID;
        $channel->name = $record->ChName;
        $channel->url = $record->ChURL;
        $channel->save();
        return $channel;
    }

    private function saveProgram($record, $title, $channel)
    {
        $program = new Program;
        $program->id = $record->PID;
        $program->channel_id = $channel->id;
        $program->title_id = $title->id;
        $program->count = $record->Count ? : 0;
        $program->start_offset = $record->StOffset ? : 0;
        $program->start_time = date('Y-m-d H:i:s', $record->StTime) ? : '';
        $program->end_time = date('Y-m-d H:i:s', $record->EdTime) ? : '';
        $program->last_update = date('Y-m-d H:i:s', $record->LastUpdate) ? : '';
        $program->sub_title = $record->SubTitle ? : '';
        $program->flag = $record->Flag ? : 0;
        $program->deleted = $record->Deleted ? : 0;
        $program->warn = $record->Warn ? : 0;
        $program->revision = $record->Revision ? : 0;
        $program->all_day = $record->AllDay ? : 0;
        $program->save();
    }
}
