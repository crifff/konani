<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
    $programsProvider=new EMongoDocumentDataProvider(
      Program::model()->konki()->beforeOneHour()->oneWeek(),
      array(
        'pagination'=>array(
          'pageSize'=>20,
        ),
      )
    );
    $this->render('index',array(
      'dataProvider'=>$programsProvider
    ));
  }

  /**
   * This is the action to handle external exceptions.
   */
  public function actionError()
  {
    if ($error=Yii::app()->errorHandler->error) {
      if(Yii::app()->request->isAjaxRequest)
        echo $error['message'];
      else
        $this->render('error', $error);
    }
  }

  /**
   * Logs out the current user and redirect to homepage.
   */
  public function actionLogout()
  {
    Yii::app()->user->logout();
    $this->redirect(Yii::app()->homeUrl);
  }

  public function actionTwitterlogin()
  {
    $ui = new TwitterUserIdentity(TWITTER_COMSUMER_KEY, TWITTER_COMSUMER_SECRET);
    if ($ui->authenticate()) {
      $user=Yii::app()->user;
      $user->login($ui);
      Yii::log($user->name.' logined ','info','application.controller.site');
      if (!User::model()->findByAttributes(array('twitter_id'=>$user->getName()))) {
        $model = new User;
        $model->twitter_id = $user->getName();
        $model->nickname = $user->getName();
        $model->save();
      };
      $this->redirect($user->returnUrl);
    } else {
      throw new CHttpException(401, $ui->error);
    }
  }
}
