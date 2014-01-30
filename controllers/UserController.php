<?php

namespace app\controllers;

use app\models\Program;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex($date = null)
    {
        $user = \Yii::$app->user->identity;

        $programs = Program::find()->today($date)
            ->with('title', 'channel')
            ->innerJoin('title', 'title.id = program.title_id')
            ->innerJoin('channel', 'channel.id = program.channel_id')
            ->innerJoin(
                'favorite',
                "title.id = favorite.title_id
            AND channel.id = favorite.channel_id
            AND favorite.user_id={$user->id}"
            )->orderBy('start_time', SORT_DESC);
        $dataProvider = new ActiveDataProvider([
            'query' => $programs,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

}
