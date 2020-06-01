<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login col-sm-6 col-md-9 col-md-offset-4">
    <div class="row">
        <div class="col-lg-5 panel panel-default" style="padding:20px;">
            <?php $form = ActiveForm::begin(); ?>
            <div class="panel " style="width: 50%;">

            	<?= $form->field($trackStauts, 'token')->textInput(['maxlength' => true]) ?>
        	    <?= $form->field($trackStauts, 'mobile_no')->textInput(['maxlength' => true]) ?>
        	
            </div>
            
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
    <div class="col-lg-4"></div>
</div>
