<?php
use yii\web\JqueryAsset;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\ProgramSearch $searchModel
 * @var $channels \app\models\Channel[]
 */

$this->registerJsFile('/js/jquery.grid-a-licious.min.js', [JqueryAsset::className()]);
$this->registerJs(
    <<<'JS'
$("#series-container").gridalicious({
  width:180,
  animate: true,
  gutter: 0,
  animationOptions: {
    queue: true,
    speed: 50,
    duration: 400,
    effect: 'fadeInOnAppear'
  }
});
//.nested({
//  minWidth: 150,
//  gutter: 0,
//  animate: true,
//  animationOptions: {
//    speed: 10,
//    duration: 20,
//  }

//});
JS
    ,
    \yii\web\View::POS_END
);
$this->title = 'Series';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="series-container-wrapper">
    <div id="series-container">
        <?php shuffle($images->d->results) ?>
        <?php foreach ($images->d->results as $image): ?>
            <div class="item">
                <img src="<?= $image->Thumbnail->MediaUrl ?>"/>
            </div>
        <?php endforeach ?>
    </div>
    <h1><?= $title->title ?></h1>
</div>
<div class="container">
    <div class="series-info">
        <h2>放送局</h2>
        <ul class="list-group">
            <?php foreach ($channels as $channel): ?>
                <li class="list-group-item">
                    <a href="<?=
                    Yii::$app->urlManager->createUrl(
                        'series/check',
                        ['title_id' => $title->id, 'channel_id' => $channel->id]
                    ) ?>">
                        <?= $channel->name ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
        <!--        --><? //= var_dump($title) ?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">memo</div>
            <div class="panel-body">

                <?= nl2br($title->comment) ?>
            </div>
        </div>

    </div>
</div>
