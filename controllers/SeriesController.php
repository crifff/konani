<?php

namespace app\controllers;

use app\models\Favorite;
use app\models\Title;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * ProgramController implements the CRUD actions for Program model.
 */
class SeriesController extends Controller
{
    /**
     * Lists all Program models.
     * @return mixed
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
        $channels = title::find(['id' => $id])->getChannels()->all();

        return $this->render(
            'view',
            [
                'title' => $title,
                'channels' => $channels,
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
