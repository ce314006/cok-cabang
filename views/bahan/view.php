<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Button;
use yii\helpers\Url;
use kartik\money\MaskMoney;


/* @var $this yii\web\View */
/* @var $model frontend\models\Bahan */

$this->title = $model->nama_bahan;
$this->params['breadcrumbs'][] = ['label' => 'Project', 'url' => ['/project/view', 'id' => $model->id_project]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahan-view">
<hr>
    <h1><?= Html::encode($this->title) ?></h1>
<hr>
<!--
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_bahan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_bahan], [
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
            'id_bahan',
            'id_project',
            'nama_bahan',
            'jumlah_bahan',
            'unit',
            [
                'attribute'=>'harga_bahan',
                'value' => 'Rp. '. Yii::$app->formatter->asDecimal($model->harga_bahan),
                'format' => 'raw',
'prefix' => html_entity_decode('&#8377; '), // the Indian Rupee Symbol
    'suffix' => '', 
    'affixesStay' => true,
    'thousands' => ',',
    'decimal' => '.',
    'precision' => 2, 
    'allowZero' => true,
    'allowNegative' => true,
            ],
            //'harga_bahan',

        ],
    ]) ?>
 
<?= Html::a('back', ['/project/view', 'id' => $model->id_project], ['class'=>'btn btn-primary']);?>


</div>
