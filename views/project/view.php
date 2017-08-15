<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model frontend\models\Project */

$this->title = $model->nama_project;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .modal-header, h4, .close {
        background-color: #666699;
        color:white !important;
        text-align: center;
        font-size: 30px;
    }
    .modal-footer {
        background-color: #f9f9f9;
    }
</style>



<div class="project-view">
<hr>
    <h1><?= Html::encode($this->title) ?></h1>
<hr>
<!--
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_project], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_project], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_project',
            'no_AFCE',
            'nama_project',
            [
                'attribute'=>'jumlah_biaya',
                'value' => 'Rp. '. Yii::$app->formatter->asDecimal($model->jumlah_biaya),
                'format' => 'raw',
            ],
            [
                'attribute'=>'sisa_biaya',
                'value' => 'Rp. '. Yii::$app->formatter->asDecimal($model->sisa_biaya),
                'format' => 'raw',
            ],
        ],
    ]) ?>
        
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tambah Bahan</h4>
                        </div>
                        <div class="modal-body">
                            <p><?php
                                echo $this->render('_form_bahan', [
                                    'model' => $modelbahan,
                                ]);
                                ?></p>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>

                </div>
            </div>
        
        
        <div class="box-header">
                <p>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Bahan</button>
        </p>
        </div>
        
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name.nama_project',
            //'id_bahan',
            'nama_bahan',
            'jumlah_bahan',
            'unit',
            //'harga_bahan',
            [
                'attribute'=>'harga_bahan', 
                'format'=> 'raw',
                'value'=>function ($model) { 
                    return 'Rp. '. Yii::$app->formatter->asDecimal($model->harga_bahan);
                }
            ],
                        [
                'attribute'=>'Edit', 
                'format'=> 'raw',
                'value'=>function ($model) { 
                                        return '<div>' . Html::a(' View', [ 'bahan/view', 'id' => $model->id_bahan,], [
                                                        'class' => 'btn btn-info fa fa-check',
                                                        ]
                                                    ).'  '.Html::a(' Update', [ 'bahan/update', 'id' => $model->id_bahan,], [
                                                        'class' => 'btn btn-primary fa fa-check',
                                                        ]
                                                    ).' '.Html::a(' Delete', [ 'bahan/delete', 'id' => $model->id_bahan,], [
                                                        'class' => 'btn btn-danger fa fa-check',
                                                        'data' => [
                                                            'confirm' => 'Are you sure want to delete ' . $model->nama_bahan . ' ?',
                                                            'method' => 'post',
                                                        ],]
                                                    )
                                                    . '</div>';
                }
            ],


            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>