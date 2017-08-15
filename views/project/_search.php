<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<b><span style="background-color: #FFFF00">"Silahkan isi data yang ingin anda cari."</span></b><hr>
    <div class="col">
    <div class="col-md-2">
    <?= $form->field($model, 'id_project')->textInput(['style'=>'width:150px']); ?></div>
    <div class="col-md-2">
    <?= $form->field($model, 'nama_project')->textInput(['style'=>'width:150px']); ?></div>
    <div class="col-md-2">
    <?= $form->field($model, 'no_AFCE')->textInput(['style'=>'width:150px']); ?></div>
    <div class="col-md-6">
    <!-- <?= $form->field($model, 'jumlah_biaya') ?> --></div>
    

  <!--  <?= $form->field($model, 'sisa_biaya') ?> -->
    
    <div class="col-md-1" style="padding-top: 25px">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?></div>
        <div class="col-md-1" style="padding-top: 25px">
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
