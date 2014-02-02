<?php

namespace app\models;

use yii\base\Model;
use Yii;

/**
 * Class ProgramSearch
 * @package app\models
 */
class ImageSearch extends Model
{
    public static function getImages(Title $title)
    {
        $key = "images_by_title_id_{$title->id}";
        $images = Yii::$app->cache->get($key);
        if (!$images) {
            $images = ImageSearch::search($title->title);
        }
        Yii::$app->cache->set($key, $images);
        return $images;
    }

    public static function search($query, $categoryId = 0)
    {
        $acctKey = Yii::$app->params['bingAccountKey'];

        $rootUri = 'https://api.datamarket.azure.com/Bing/Search';
        // Encode the query and the single quotes that must surround it.

        $category = self::categoryWord($categoryId);
        $query = urlencode("'{$query} {$category}'");

        // Get the selected service operation (Web or Image).

        $serviceOp = "Image";

        // Construct the full URI for the query.

        $requestUri = "$rootUri/$serviceOp?\$format=json&Query=$query";
        $auth = base64_encode("$acctKey:$acctKey");

        $data = array(
            'http' => array(
                'request_fulluri' => true,
                'ignore_errors' => true,
                'header' => "Authorization: Basic $auth"
            )
        );
        $context = stream_context_create($data);
        $response = file_get_contents($requestUri, 0, $context);
        $jsonObj = json_decode($response);

        return $jsonObj;
    }

    public static function categoryWord($categoryId)
    {
        switch ($categoryId) {
            case 1:
            case 10:
                return "アニメ";
            case 2:
                return "ラジオ";
            case 4:
                return "特撮";
            case 7:
                return "OVA";
            case 8:
                return "映画";
        }
        return "";
    }
}
