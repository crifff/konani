<?php

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\ProgramSearch $searchModel
 * @var $channels \app\models\Channel[]
 */

$this->title = 'Series';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-index">
    <?= var_dump($title) ?>
</div>
<?php foreach ($channels as $channel): ?>
    <a href="<?=
    Yii::$app->urlManager->createUrl(
        'series/check',
        ['title_id' => $title->id, 'channel_id' => $channel->id]
    ) ?>">
        <?= $channel->name ?>
    </a><br/>
<?php endforeach ?>

