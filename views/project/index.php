<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use frontend\models\Bahan;
use frontend\models\Project;
use yii\data\SqlDataProvider;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projek';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php  echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="project-index">
    <style type="text/css">
        .modal-header {
            border-top: 1px solid white;
            border-left: 1px solid white;
            border-right: 1px solid white;
            text-align: left;
            font-size: 23px;
            color: white;
            background-color: #261f31;
            border-bottom: 0px;
        }
        .close {
            color: #fff; 
            opacity: 1;
        }
    </style>
    <div class="row">
    <div class="col-sm-12">
    <hr>
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>    
    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <b><span style="background-color: #FFFF00">"Silahkan klik nama projek untuk melihat detail projek anda."</span></b>

        <?php
    Modal::begin([
        'header' => 'Detail Bahan',
        'id' => 'modal',
        'size' => 'modal-lg'
    ]);

    echo "<div id= 'modalContent'></div>";

    Modal::end();
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
                'attribute' => 'ID Project',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->id_project;
                }
            ],
            'no_AFCE',
            [
                'attribute'=>'Nama Project', 
                'format'=> 'raw',
                'value'=>function ($model) { 
                    return html::button($model->nama_project ,
                                        ['value' =>Url::to(['project/viewbahan','id'=>$model->id_project]), 'class'=>'modalasd btn btn-link']); 
                }
            ],
            [
                'attribute' => 'Jumlah Biaya',
                'format' => 'raw',
                'value' => function ($model) {
                    return 'Rp. ' . Yii::$app->formatter->asDecimal($model->jumlah_biaya);
                }
            ],
			[
                'attribute' => 'Sisa Biaya',
                'format' => 'raw',
                'value' => function ($model) {
                    return 'Rp. ' . Yii::$app->formatter->asDecimal($model->sisa_biaya);
                }
            ],
            /* contoh gan
            [
                'attribute' => 'Tambah Bahan',
                'format' => 'raw',
                'value' => function ($model) {
                    return 'Rp. ' . $model->sisa_biaya;
                }
            ],
            */
            ['class' => 'yii\grid\ActionColumn'],
			
        ],
    ]);
    ?>
	
?>


</div>