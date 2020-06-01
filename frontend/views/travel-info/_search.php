<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TravelInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'travel_type') ?>

    <?= $form->field($model, 'reason') ?>

    <?= $form->field($model, 'start_date') ?>

    <?= $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'source_locality') ?>

    <?php // echo $form->field($model, 'source_district') ?>

    <?php // echo $form->field($model, 'source_state') ?>

    <?php // echo $form->field($model, 'source_police_station') ?>

    <?php // echo $form->field($model, 'dest_locality') ?>

    <?php // echo $form->field($model, 'dest_district') ?>

    <?php // echo $form->field($model, 'dest_state') ?>

    <?php // echo $form->field($model, 'dest_police_station') ?>

    <?php // echo $form->field($model, 'vehicle_type') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
