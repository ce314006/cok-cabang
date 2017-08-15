<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use frontend\models\Bahan;
use frontend\models\Project;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Bahan Proyek';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahan-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
           // 'id_project',

            'nama_bahan',
            'jumlah_bahan',
        /*    [
                'attribute' => 'harga_bahan',
                'format' => 'raw',
                'value' => function ($model) {
                    return 'Rp. ' . Yii::$app->formatter->asDecimal($model->harga_bahan);
                }
            ], */
            'harga_bahan',

        ],
        
    ]); ?>
</div>
<div>
<?php echo 'Total Harga Bahan : Rp. '. Yii::$app->formatter->asDecimal($total) ?>
</div>