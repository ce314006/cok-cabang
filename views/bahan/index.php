<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bahan projek';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahan-index">
<hr>
    <h1><?= Html::encode($this->title) ?></h1>
<hr>    
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <hr width="10">
    <p>
   <!--     <?= Html::a('Create Bahan', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name.nama_project',
            'id_bahan',
            'nama_bahan',
            'jumlah_bahan',
            'unit',
            'harga_bahan',
          /*  [
                'attribute'=>'harga_bahan', 
                'format'=> 'raw',
                'value'=>function ($model) { 
                    return 'Rp. '.$model->harga_bahan ; 
                }
            ],
            */


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
