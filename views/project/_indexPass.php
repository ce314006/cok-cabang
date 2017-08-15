<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Request */


$this->params['breadcrumbs'][] = $this->title;

?>
<div class="request-create">

    <?=
    $this->renderAjax('index', [
       'searchModel' => $searchModel,
       'bahan' => $bahan,
       'dataProvider' => $dataProvider,
	   'dataBahan'=>$dataBahan,
//	   'model' =>$model,
    ])
    ?>

</div>
