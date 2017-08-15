<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Search Bahan';
$this->params['breadcrumbs'][] = $this->title;
?>

<hr>
    <h1><?= Html::encode($this->title) ?></h1>
<hr>    
    <?php 
    	echo $this->render('_search', ['model' => $searchModel]); 
    ?>

 
