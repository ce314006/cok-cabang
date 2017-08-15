<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'id_project')->textInput() ?>

    <?= $form->field($model, 'no_AFCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_project')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_biaya')->textInput() ?>

<!--    <?= $form->field($model, 'sisa_biaya')->textInput() ?>  -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
