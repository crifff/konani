<?php

use app\models\Cour;
use yii\helpers\Html;
use yii\widgets\ListView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\ProgramSearch $searchModel
 */

$this->title = 'Series';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-index">

    <div class="text-center">
        <h1>
            <?= $year ?>年<?= Cour::seasonName($season) ?>期
        </h1>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <ul class="pager">
        <li class="previous"><a href="<?= Cour::getPreviousSeasonUrl($year, $season); ?>">&laquo; 前期 </a></li>
        <li class="next"><a href="<?= Cour::getNextSeasonUrl($year, $season) ?>"> 次期 &raquo;</a>
        </li>
    </ul>

    <div class="row">
        <?php foreach ($dataProvider->models as $anime): ?>
            <a href="<?= Html::url(['view', 'id' => $anime->id]) ?>">
                <div class="col-xs-2 col-sm-4 col-md-3 col-lg-2">
                    <div class="thumbnail <?php if(!empty($anime->favorites)):?> favorite-anime-box<?php endif?>">
                        <div style="width: 100%;min-height: 150px; background-image: url(<?= Html::url(
                            ['series/image', 'id' => $anime->id]
                        ) ?>); background-size: 155px;background-repeat: no-repeat;">
                        </div>
                        <div class="caption">
                            <h5 style="height: 2em"><?= $anime->title ?></h5>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>

    <?php /* echo ListView::widget(
        [
            'dataProvider' => $dataProvider,
            'layout' => '{items}',
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {
                    $title = Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
                    $image = Html::url(['series/image', 'id' => $model->id]);
                    return Html::tag(
                        'a',
                        Html::tag(
                            'div',
                            Html::tag('div', $model->title, ['style' => 'height:3em;']) .
                            Html::tag(
                                'div',
                                ''
                                ,
                                ['style' => "width: 100%;min-height: 150px; background-image: url({$image}); background-size: 150px;background-repeat: no-repeat"]
                            ),
                            ['class' => 'col-sm-3 col-md-2']
                        )
                        ,
                        ['href' => Html::url(['series/view', 'id' => $model->id])]
                    );

                    //                    return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
                },
        ]
    );*/ ?>


</div>
