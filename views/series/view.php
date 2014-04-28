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
    $(function () {
        $('.js-check').click(function (e) {
            console.log('ci');
            e.preventDefault();
            var anchor = $(this);
            var url = anchor.attr('href');
            $.post(url).success(function (data) {
                if (data.result === 'check')
                    anchor.find('span').removeClass('no-checked').addClass(('checked'));
                else if (data.result === 'uncheck')
                    anchor.find('span').removeClass('checked').addClass(('no-checked'));
            });
            return;
        });
    });
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
<div class="row">
    <div class="col-md-12">
        <h2>放送局</h2>
        <ul class="list-group">
            <?php foreach ($title->channels as $channel): ?>
                <?php $isChecked = \app\models\Favorite::find(
                    ['user_id' => Yii::$app->user->id, 'title_id' => $title->id, 'channel_id' => $channel->id]
                ) ?>
                <a href="<?=
                Yii::$app->urlManager->createUrl(
                    'series/check',
                    ['title_id' => $title->id, 'channel_id' => $channel->id]
                ) ?>" class="list-group-item js-check">
                    <span class="glyphicon glyphicon-check <?= $isChecked ? 'checked' : 'no-checked' ?>"></span>
                    <?= $channel->name ?>
                </a>
            <?php endforeach ?>
        </ul>
        <h2>リンク</h2>

        <div class="list-group">
            <?php foreach (\app\models\Memo::links($title->comment) as $link): ?>
                <a href="<?= $link['url'] ?>" class="list-group-item" target="_blank"><?= $link['label'] ?> <span
                        class="glyphicon glyphicon-new-window"></span></a>
            <?php endforeach ?>
        </div>
    </div>
</div>
<script>

</script>
