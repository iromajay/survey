<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TravelType */

$this->title = 'Create Travel Type';
$this->params['breadcrumbs'][] = ['label' => 'Travel Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
