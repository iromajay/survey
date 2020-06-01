<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TravelInfo */

$this->title = 'Registration';
// $this->params['breadcrumbs'][] = ['label' => 'Travel Infos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-info-create">


    <?= $this->render('_form', [
        'model' => $model,
        'passenger' => $passenger
    ]) ?>

</div>
