
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
        	<div class="row">
                <div class="col-lg-3 col-lg-offset-2">
                    <?= $form->field($model, 'oldPassword')->passwordInput(['autofocus' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-lg-offset-2">
                    <?= $form->field($model, 'newPassword')->passwordInput() ?>
                </div>
             </div>
             <div class="row">
                 <div class="col-lg-4 col-lg-offset-2">
                    <?= $form->field($model, 'password_repeat')->passwordInput() ?>
                </div>
             </div>
              <div class="form-group col-lg-2 col-lg-offset-2" style="margin-top: 21px;">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
              </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
