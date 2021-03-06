<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Project */

$this->title = 'Edit projek: ' . ' ' . $model->nama_project;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_project, 'url' => ['view', 'id' => $model->id_project]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-update">
<hr>
    <h1><?= Html::encode($this->title) ?></h1>
<hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
