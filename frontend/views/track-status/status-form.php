<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-2 panel panel-default" style="padding:20px;">
        <?php $form = ActiveForm::begin(); ?>
                <div class="col-lg-3 col-lg-offset-2">
                    <?= $form->field($trackStauts, 'token')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($trackStauts, 'mobile_no')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="form-group col-lg-2" style="margin-top: 21px;">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
                </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
