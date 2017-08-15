<?php

namespace frontend\controllers;

use Yii;
use yii\db\Query;
use frontend\models\Project;
use frontend\models\ProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use frontend\models\Bahan;
use yii\data\SqlDataProvider;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller {

    public function behaviors() {
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
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex() {
		$model = Bahan::find()->all();
        $searchModel = new ProjectSearch();
        $dataBahan = new \yii\data\ActiveDataProvider([
            'query' => Bahan::find(),
        ]);

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $bahan = new Bahan();
        return $this->render('_indexPass', [
                    'searchModel' => $searchModel,
                    'bahan' => $bahan,
                    'dataProvider' => $dataProvider,
					'model'=>$model,
					'dataBahan' => $dataBahan,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
                    $modelbahan = new Bahan();
                    $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => Bahan::find()->where(['id_project'=>$id]),
            ]);
                    $modelbahan->id_project = $id;
                    $project = $this->findModel($id);
                    if ($modelbahan->load(Yii::$app->request->post())) {
                            if($project->sisa_biaya < $modelbahan->harga_bahan){
                                    Yii::$app->getSession()->setFlash(
                            'danger', 'Sisa biaya tidak cukup, mohon diperhatikan kembali'
                    );
                                    return $this->render('view', [
                                                    'model' => $project,
                                                    'dataProvider' => $dataProvider,
                                                    'modelbahan' => $modelbahan,
                                    ]);
                            } else {
                                    $project->sisa_biaya = $project->sisa_biaya-$modelbahan->harga_bahan;
                                    if($project->save() && $modelbahan->save()){
    //                                                        die();
                                            return $this->redirect(['view', 'id' => $id]);
                                    } else {
                                            Yii::$app->getSession()->setFlash(
                                                            'danger', 'Unable to save'
                                            );                                
                                            return $this->redirect(['view', 'id' => $id]);                                
                                    }
                                    
                            }
            } else {
                            return $this->render('view', [
                                                    'model' => $project,
                                                    'dataProvider' => $dataProvider,
                                                    'modelbahan' => $modelbahan,
                            ]);
            }
                    
            
        }

    public function actionSproject() {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('sproject', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewbahan($id) {
        $query = Project::find()->where(['id_project' => $id])->one();
        $query = Bahan::find()->where(['id_project' => $id]);
        $total = $query->sum('harga_bahan');

        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT project.jumlah_biaya, bahan.id_project, bahan.nama_bahan, bahan.jumlah_bahan, bahan.harga_bahan FROM project JOIN bahan ON project.id_project = bahan.id_project WHERE bahan.id_project =:id_project',
            'params' => [':id_project' => $id],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->renderAjax('projectBahan', [
                    'query' => $query,
                    'total' => $total,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Project();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->sisa_biaya = $model->jumlah_biaya;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_project]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $sisa = $model->jumlah_biaya - $model->sisa_biaya;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->sisa_biaya =$model->jumlah_biaya - $sisa;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_project]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
                    $bahans = Bahan::find()->where(['id_project'=>$id])->all();
                    foreach($bahans as $bahan){
                            $bahan->delete();
                    }
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
                throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
