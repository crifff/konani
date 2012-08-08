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
            array('allow',
                'actions'=>array('admin','delete','create','update'),
                'users'=>array('admin'),
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new Series;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Series'])) {
            $model->attributes=$_POST['Series'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->_id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Series'])) {
            $model->attributes=$_POST['Series'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->_id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
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
   * Manages all models.
   */
  public function actionAdmin()
  {
    $model = new Series('search');
    $model->unsetAttributes();

    if(isset($_GET['Series']))
      $model->setAttributes($_GET['Series']);

    $this->render('admin', array(
      'model'=>$model
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

  /**
   * Performs the AJAX validation.
   * @param CModel the model to be validated
   */
  protected function performAjaxValidation($model)
  {
    if (isset($_POST['ajax']) && $_POST['ajax']==='series-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
}
