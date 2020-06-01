<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceStation */

$this->title = 'Create Police Station';
$this->params['breadcrumbs'][] = ['label' => 'Police Stations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="police-station-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
