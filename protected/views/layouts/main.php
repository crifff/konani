<!DOCTYPE html>
<html lang="ja">
    <meta charset="utf-8">
    <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body data-spy="scroll" data-target=".subnav" data-offset="50">
<div class="container">
    <header>
<div class="row">
  <div class="span10"><h1><?php echo CHtml::link(Yii::app()->name,'/'); ?></h1></div>
  <div class="span2">
      <?php if(Yii::app()->user->isGuest):?>
      <?php echo CHtml::link('Sign in with Twitter',array('site/twitterlogin'),array('class'=>'btn btn-primary'))?>
      <?php else:?>
      <?php echo CHtml::link(Yii::app()->session['twitter_user']->screen_name, array('user/view','id'=>Yii::app()->session['twitter_user']->screen_name))?>
      <?php echo CHtml::link(CHtml::image(Yii::app()->session['twitter_user']->profile_image_url_https,''),array('user/view','id'=>Yii::app()->session['twitter_user']->screen_name))?>
      <?php endif?>
  </div>
</div>

      <?php if(isset($this->breadcrumbs)):?>
<?php $this->widget('zii.widgets.CBreadcrumbs', array(
  'links'=>$this->breadcrumbs,
)); ?>
      <?php endif?>
    </header>



    <?php echo $content; ?>
<!--
<?php $this->widget('zii.widgets.CMenu',array(
  'items'=>array(
    array('label'=>'Home', 'url'=>array('/site/index')),
    array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
    array('label'=>'User', 'url'=>array('user/index')),
    array('label'=>'Program', 'url'=>array('program/index')),
    array('label'=>'Series', 'url'=>array('series/index')),
    array('label'=>'Season', 'url'=>array('cour/index','year'=>2012,'cour'=>2)),
    array('label'=>'Contact', 'url'=>array('/site/contact')),
    array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
    array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
  ),
)); ?>
-->
    <footer>
      author: <a href="https://twitter.com/crifff/" target="_blank">@crifff</a><br />
      <?php echo Yii::powered(); ?>
    </footer>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="/css/bootstrap/js/bootstrap.js"></script>
</div>
  </body>
</html>

