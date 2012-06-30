<?php

class SeriesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('check'),
				'users'=>array('crifff'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('crifff'),
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
    $series=$this->loadModel($id);
    $programs=$series->getChannels();
    $user = User::model()->findByAttributes(
      array( 'twitter_id'=>Yii::app()->session['twitter_user']->screen_name)
    );
    if($user)
      $user->marking($programs);
		$this->render('view',array(
			'model'=>$series,
			'programs'=>$programs,
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

		if(isset($_POST['Series']))
		{
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

		if(isset($_POST['Series']))
		{
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new EMongoDocumentDataProvider('Series');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
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

  public function actionCheck()
  {
    $user = User::model()->findByAttributes(
      array( 'twitter_id'=>Yii::app()->session['twitter_user']->screen_name)
    );

    $condition=array(
      'TID' => $_GET['tid'],
      'ChID' => $_GET['chid']
    );
    if($user->isCheckedSeries($condition))
    {
      $user->uncheck($condition);
      echo '<span style="float:right" class="check"></span>';
    }
    else
    {
      $user->check($condition);
      echo '<span style="float:right" class="check">✔</span>';
    }
    return;

    

    $OAuth = new tmhOAuth(array(
      'consumer_key'    => TWITTER_COMSUMER_KEY,
      'consumer_secret' => TWITTER_COMSUMER_SECRET
    ));
    $session=Yii::app()->session;
    $OAuth->config['user_token']  = $session['access_token']['oauth_token'];
    $OAuth->config['user_secret'] = $session['access_token']['oauth_token_secret'];

    $OAuth->request('POST', $OAuth->url('1/statuses/update'),array('status'=>'test'.time()));
    $params = ($OAuth->response['response']);
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer the ID of the model to be loaded
   */
  public function loadModel($id)
  {
    //$model=Series::model()->findByPk(new MongoId($id));
    $model=Series::model()->findByAttributes(array('TID'=>$id));
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
    if(isset($_POST['ajax']) && $_POST['ajax']==='series-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
}
