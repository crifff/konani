<?php

namespace app\models;

use yii\base\Model;

class Memo extends Model
{
    public static function links($text)
    {
        //        $paragraph = preg_split('/(\n\*|^\*)(?!\*)/',$text);
        preg_match_all('/-\[\[(.+) (.+)\]\]/', $text, $matches);

        $links = array();
        foreach ($matches[1] as $key => $label) {
            $links[$key] = [
                'label' => $label,
                'url' => $matches[2][$key],
            ];
        }
        return $links;
    }
}
