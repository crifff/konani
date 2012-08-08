<?php

class CourController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
    $year=($_GET['year'])?:date('Y');
    $series=Series::model()->season($_GET['season'],$year)->findAll();
    if (!Yii::app()->user->isGuest) {
      $user = User::model()->findByAttributes( array( 'twitter_id'=>Yii::app()->session['twitter_user']->screen_name));
      if($user)
        $user->marking($series);
    }
    $this->render('index',array(
      'year'=>$_GET['year'],
      'season'=>$_GET['season'],
      'series'=>$series,
    ));
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer the ID of the model to be loaded
   */
  public function loadModel($id)
  {
    $model=Series::model()->findByPk(new MongoId($id));
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');

    return $model;
  }

}
