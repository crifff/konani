<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;

$this->title = '今日のアニメ';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="program-index">
    <h1><?= \Yii::$app->user->identity->username ?>のリスト</h1>

    <h2>今日のアニメ</h2>


    <?php echo \yii\widgets\ListView::widget(
        [
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {
                    return Html::a(
                        Html::encode(
                            $model->start_time
                            . " "
                            . $model->title->title
                            . " "
                            . $model->channel->name
                        ),
                        ['series/view', 'id' => $model->title_id]
                    );
                },
        ]
    ); ?>
</div>
