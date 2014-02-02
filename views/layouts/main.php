<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin(
        [
            'brandLabel' => '<img src="/images/logo2.png" id="nav-logo">',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'id' => 'header',
                'class' => '',
            ],
        ]
    );
    echo Nav::widget(
        [
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => '今日のアニメ', 'url' => ['/program']],
                ['label' => '今期', 'url' => ['/series/2014/winter']],
                Yii::$app->user->isGuest ?
                    ['label' => 'Login', 'url' => ['/site/auth', 'authclient' => 'twitter']] :
                    [
                        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],
            ],
        ]
    );
    NavBar::end();
    ?>
    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
