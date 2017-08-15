<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bahan-search">
    <?php $form = ActiveForm::begin([

    'action' => ['index'],
    'method' => 'get',
]); ?>
<b><span style="background-color: #FFFF00">"Silahkan isi data yang ingin anda cari."</span></b><hr>
    <div class="col">
    <div class="col-md-6">
    <?= $form->field($model, 'id_bahan')->textInput(['style'=>'width:300px']); ?></div>
    <div class="col-md-6">
    <?= $form->field($model, 'id_project')->textInput(['maxlength'=>30,'style'=>'width:300px']); ?></div>
    <div class="col-md-6">
    <?= $form->field($model, 'nama_bahan')->textInput(['style'=>'width:300px']); ?></div>
    <div class="col-md-6">
    <?= $form->field($model, 'jumlah_bahan')->textInput(['style'=>'width:300px']); ?></div>
    <div class="col-md-6">
    <?= $form->field($model, 'unit')->textInput(['style'=>'width:300px']); ?></div>
    <div class="col-md-6">
    <?= $form->field($model, 'harga_bahan')->textInput(['style'=>'width:300px']); ?></div>
    <div class="col-md-6">
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
