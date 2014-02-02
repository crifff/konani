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

    <?php echo ListView::widget(
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
                                                            ,['style' => "width: 100%;min-height: 150px; background-image: url({$image}); background-size: 150px;background-repeat: no-repeat"]
                            ),
                            ['class' => 'col-sm-3 col-md-2']
                        )
                        ,
                        ['href' => Html::url(['series/view', 'id' => $model->id])]
                    );

                    //                    return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
                },
        ]
    ); ?>


</div>
