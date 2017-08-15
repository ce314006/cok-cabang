<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Project;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bahan-form">

    <?php $form = ActiveForm::begin(); ?>
        
    
    <?= $form->field($model, 'nama_bahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_bahan')->textInput() ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga_bahan')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '999.999.999.999.999',]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
