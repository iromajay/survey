<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-lg-12 col-lg-offset-4" ><h3 style="color: #b2acfa"><b>Create User</b></h3></div>
<br><br><br><br>

<div class="row">
    <div class="col-lg-6 col-lg-offset-2 panel panel-default" style="padding:20px;">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

      
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
