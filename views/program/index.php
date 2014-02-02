<?php

use app\helpers\DateHelper;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\ProgramSearch $searchModel
 * @var \DateTime $date
 */

$this->title = '今日のアニメ';
$this->params['breadcrumbs'][] = $this->title;
$today = clone $date;
$yesterday = clone $date->sub(new DateInterval('P1D'));
$tomorrow = clone $date->add(new DateInterval('P2D'));
?>
<div class="container">
<div class="program-index">

    <div class="text-center">
        <h1>
            <?= date('m/d') ?>(<?= DateHelper::youbi(date('N', $today->getTimestamp())) ?>)のアニメ
        </h1>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <ul class="pager">
        <li class="previous"><a
                href="<?=
                Html::Url(
                    ['program/index', 'date' => $yesterday->format('Y-m-d')]
                ) ?>">&laquo; <?= $yesterday->format('m/d') ?>(<?= DateHelper::youbi(
                    date('N', $yesterday->getTimestamp())
                ) ?>)</a></li>
        <li class="next"><a href="<?=
            Html::Url(
                ['program/index', 'date' => $tomorrow->format('Y-m-d')]
            ) ?>"><?= $tomorrow->format('m/d') ?>(<?= DateHelper::youbi(date('N', $tomorrow->getTimestamp())) ?>
                ) &raquo;</a>
        </li>
    </ul>
    <ul class="program-list">
        <?php /** @var $model \app\models\Program */
        foreach ($dataProvider->getModels() as $model): ?>
            <li>
                <div class="start-time">
                    <?php if (strtotime($model->start_time) < time() && time() < strtotime($model->end_time)): ?>
                        <span class="label label-info">放送中</span>
                        <br/>
                    <?php endif ?>
                    <?php if (strtotime($model->start_time) - 300 < time() && time() < strtotime(
                            $model->start_time
                        )
                    ): ?>
                        <span class="label label-success">もうすぐ</span>
                        <br/>
                    <?php endif ?>
                    <?= date('H:i', strtotime($model->start_time)) ?> 〜 <?= date('H:i', strtotime($model->end_time)) ?>
                </div>
                <div class="title-wrap">
                    <div>
                        <span class="label label-default"><?= Html::encode($model->channel->name) ?></span>
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
                            <span class="story-count">
                            <?php if ($model->count): ?>
                                #<?= Html::encode($model->count) ?>
                            <?php endif ?>
                            </span>
                        </cite>
                    </div>

                    <div class="subtitle">
                        <?php if ($model->sub_title): ?>
                            『<?= Html::encode($model->sub_title) ?>』
                        <?php endif ?>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</div>

</div>
