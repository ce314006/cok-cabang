<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bahan */

$this->title = 'Edit Bahan: ' . ' ' . $model->nama_bahan;
$this->params['breadcrumbs'][] = ['label' => 'Bahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bahan, 'url' => ['view', 'id' => $model->id_bahan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bahan-update">
<hr>
    <h1><?= Html::encode($this->title) ?></h1>
<hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
