<?php

namespace app\controllers;

use app\models\Program;
use app\models\ProgramSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProgramController implements the CRUD actions for Program model.
 */
class ProgramController extends Controller
{
    /**
     * Lists all Program models.
     * @param string $date
     * @return mixed
     */
    public function actionIndex($date = null)
    {
        $searchModel = new ProgramSearch;
        if (!$date) {
            $date = date('Y-m-d H:i:s');
        }
        $date = new \DateTime($date);
        $dataProvider = $searchModel->byDate(clone $date);
        $dataProvider->setPagination(['pageSize' => 0]);

        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'date' => $date,
            ]
        );
    }

    /**
     * Displays a single Program model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render(
            'view',
            [
                'model' => $this->findModel($id),
            ]
        );
    }

    /**
     * Finds the Program model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Program the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if ($id !== null && ($model = Program::find($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
