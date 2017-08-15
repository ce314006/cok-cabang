<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Bahan;
use frontend\models\Project;
use frontend\models\BahanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BahanController implements the CRUD actions for Bahan model.
 */
class BahanController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bahan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bahan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bahan();
        if ($model->load(Yii::$app->request->post()) && $model->harga_bahan < Project::find()->where(['id_project' => $model->id_project])->one()->sisa_biaya && $model->save()) {
            
            $project = Project::find()->where(['id_project' => $model->id_project])->one();
            $project->sisa_biaya = $project->sisa_biaya - $model->harga_bahan;
            $project->save();
            
            return $this->redirect(['view', 'id' => $model->id_bahan]);
        } else {
            Yii::$app->session->setFlash('info', "Pastikan Total Harga Bahan Tidak Melebihi Jumlah Biaya Project");
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionSbahan()
    {
        $searchModel = new BahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('sbahan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Bahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
                $def = $model->harga_bahan;
                $project = Project::find()->where(['id_project'=>$model->id_project])->one();
                //$project->sisa_biaya = $project->sisa_biaya - $def;
        
        if ($model->load(Yii::$app->request->post())) {
                            if($project->sisa_biaya + $def < $model->harga_bahan){

                                    Yii::$app->getSession()->setFlash(
                            'error','Sisa biaya tidak cukup, mohon diperhatikan kembali!'
                    );
                                    return $this->render('update', [
                'model' => $model,
            ]);
                                }
                            }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                        $an = $model->harga_bahan - $def;
                        $project->sisa_biaya = $project->sisa_biaya - $an;
                        $project->save();


            return $this->redirect(['project/view', 'id' => $model->id_project]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Bahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
public function actionDelete($id)
    {
        $bahan = $this->findModel($id);
                $project = Project::find()->where(['id_project'=>$bahan->id_project])->one();
                $project->sisa_biaya = $project->sisa_biaya + $bahan->harga_bahan;
                $project->save();
                $bahan->delete();
        return $this->redirect(['project/view','id'=>$project->id_project]);
    }

    /**
     * Finds the Bahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
