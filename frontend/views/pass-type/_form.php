<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PassType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pass-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pass_type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
