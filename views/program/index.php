<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\ProgramSearch $searchModel
 * @var \DateTime $date
 */

$this->title = '今日のアニメ';
$this->params['breadcrumbs'][] = $this->title;
$today = $date->format('Y-m-d');
$yesterday = $date->sub(new DateInterval('P1D'))->format('Y-m-d');
$tomorrow = $date->add(new DateInterval('P2D'))->format('Y-m-d');
?>
<div class="program-index">

    <div class="text-center">
        <h1>
            <?php if ($today === date('Y-m-d')): ?>
                今日のアニメ
            <?php elseif ($today === date('Y-m-d', strtotime('tomorrow'))): ?>
                明日のアニメ
            <?php
            elseif ($today === date('Y-m-d', strtotime('yesterday'))): ?>
                昨日のアニメ
            <?php
            else: ?>
                <?= date('m月d日') ?>のアニメ
            <?php endif ?>
        </h1>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <ul class="pager">
        <li class="previous"><a
                href="<?= Html::Url(['program/index', 'date' => $yesterday]) ?>">&laquo; <?= $yesterday ?></a></li>
        <li class="next"><a href="<?= Html::Url(['program/index', 'date' => $tomorrow]) ?>"><?= $tomorrow ?> &raquo;</a>
        </li>
    </ul>
    <ul class="program-list">
        <?php /** @var $model \app\models\Program */
        foreach ($dataProvider->getModels() as $model): ?>
            <li>
                <div class="start-time">
                    <?= date('H:i', strtotime($model->start_time)) ?>
                </div>
                <div class="title-wrap">
                    <div>
                        <span class="badge"><?= Html::encode($model->channel->name) ?></span>
                    </div>
                    <div>

                        <cite>
                            <a href="<?=
                            yii::$app->urlManager->createUrl(
                                'series/view',
                                ['id' => $model->title_id]
                            ) ?>">
                                <?= Html::encode($model->title->title) ?>
                            </a>
                        </cite>
                    </div>

                    <div class="subtitle">
                        #<?= Html::encode($model->count) ?>
                        <?php if ($model->sub_title): ?>
                            『<?= Html::encode($model->sub_title) ?>』
                        <?php endif ?>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</div>
