<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TravelInfo */

$this->title = 'Update Travel Info: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Travel Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="travel-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
