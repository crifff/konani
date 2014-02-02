<?php

namespace app\controllers;

use app\models\Favorite;
use app\models\ImageSearch;
use app\models\Title;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;
use yii\web\HttpException;

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
                'year' => $year,
                'season' => $season,
            ]
        );
    }

    public function actionView($id)
    {
        /** @var $title \app\models\Title */
        $title = Title::find(['id' => $id]);
        if (!$title) {
            throw new HttpException(404, 'Page not exists');
        }
        //        $channels = title::find(['id' => $id])->getChannels()->all();
        //        $favorites = Favorite::find(['user_id' => Yii::$app->user->id, 'title_id' => $title->id]);
        $images = ImageSearch::getImages($title);
        return $this->render(
            'view',
            [
                'title' => $title,
                //                'channels' => $channels,
                'images' => $images,
            ]
        );
    }

    public function actionImage($id)
    {
        $key = "primary_images_by_title_id_{$id}";
        $image = Yii::$app->cache->get($key);

        if (!$image) {

            $title = Title::find(['id' => $id]);
            if (!$title) {
                throw new HttpException(404, 'Page not exists');
            }
            $images = ImageSearch::getImages($title);
            $image = array_shift($images->d->results);
            $file = file_get_contents($image->MediaUrl);
            $image = [
                'contentType' => $image->ContentType,
                'image' => $file,
            ];
            Yii::$app->cache->set($key, $image);
        }

        header("Content-Type: " . $image['contentType']);
        echo $image['image'];
        return;

    }

    public function actionCheck()
    {
        $favorite = Favorite::find(
            [
                'user_id' => Yii::$app->user->id,
                'title_id' => (int)$_GET['title_id'],
                'channel_id' => (int)$_GET['channel_id']
            ]
        );
        if ($favorite) {
            $favorite->delete();
            header('Content-Type: application/json');
            echo json_encode(['result'=>'uncheck']);
            return;
        }

        $favorite = new Favorite;
        $favorite->user_id = \Yii::$app->user->id;
        $favorite->title_id = (int)$_GET['title_id'];
        $favorite->channel_id = (int)$_GET['channel_id'];
        $favorite->created_at = date('Y-m-d H:i:s');
        if (!$favorite->save()) {
            throw new HttpException(503);
        }

        header('Content-Type: application/json');
        echo json_encode(['result'=>'check']);
        return;
    }
}
