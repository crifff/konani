<?php

namespace app\controllers;

use app\models\Favorite;
use app\models\ImageSearch;
use app\models\Title;
use yii\caching\Cache;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;

/**
 * ProgramController implements the CRUD actions for Program model.
 */
class SeriesController extends Controller
{
    /**
     * Lists all Program models.
     * @param int $year
     * @param string $season
     * @return string
     */
    public function actionIndex($year = 0, $season = '')
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Title::find()->season($year, $season),
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);

        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider,
            ]
        );
    }

    public function actionView($id)
    {
        $title = Title::find(['id' => $id]);
        if (!$title) {
            throw new HttpException(404, 'Page not exists');
        }
        $channels = title::find(['id' => $id])->getChannels()->all();

        $key = "images_by_title_id_{$title->id}";
        $images = Yii::$app->cache->get($key);
        if (!$images) {
            $images = ImageSearch::search($title->title);
        }
        Yii::$app->cache->set($key, $images);
        return $this->render(
            'view',
            [
                'title' => $title,
                'channels' => $channels,
                'images' => $images,
            ]
        );
    }

    public function actionCheck()
    {
        $favorite = new Favorite;
        $favorite->user_id = \Yii::$app->user->id;
        $favorite->title_id = (int)$_GET['title_id'];
        $favorite->channel_id = (int)$_GET['channel_id'];
        $favorite->created_at = date('Y-m-d H:i:s');
        $favorite->save();

    }
}
