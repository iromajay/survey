<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\State */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-lg-12" style="text-align: center;"><h3 style="color: #b2acfa"><b>Check Status</b></h3></div>
<br><br><br>

<div class="panel panel-default col-lg-12" style="padding: 30px;">
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
