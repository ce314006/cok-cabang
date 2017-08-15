<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Project;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bahan */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="bahan-form">

    <?php $form = ActiveForm::begin(); ?>
        
    <!-- <?= $form->field($model, 'id_project')->dropDownList(ArrayHelper::map(Project::find()->all(), 'id_project', 'nama_project'),
                                                        [
                                                            'prompt' => 'Select Project',
                                                        ]
                                                        ); ?>   -->
    <?= $form->field($model, 'id_project')->textInput(['readonly' => true]) ?>                                                        

    <?= $form->field($model, 'nama_bahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_bahan')->textInput() ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga_bahan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
