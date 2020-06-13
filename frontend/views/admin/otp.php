
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="col-lg-6 col-lg-offset-2 panel panel-default" style="padding:20px;">
        <?php $form = ActiveForm::begin(); ?>
        	<div class="row">
                <div class="col-lg-3 col-lg-offset-2">
                    <!-- Repalce with OTP -->
                    <?= $form->field($model, 'oldPassword')->passwordInput(['autofocus' => true]) ?>
                </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-2 col-lg-offset-2" style="margin-top: 21px;">
                      <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
              </div>
              <div class="form-group col-lg-3 " style="margin-top: 25px;">
                <button id="btnResend" class="btn-primary">Resend OTP</button>
              </div>
            </div>
              <div class="row hide" id="otp" >
                <div class="form-group col-lg-4 col-lg-offset-2">
                  Resend OTP in:<span id="time"></span>
                </div>
                
              </div>
                
              
        <?php ActiveForm::end(); ?>
    </div>

<script type="text/javascript">
  var otp = document.querySelector("#otp");
  var display = document.querySelector('#time');
  var resend = document.getElementById("btnResend")
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var setTime = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {

            clearInterval(setTime);
            otp.classList.toggle("hide");
            resend.disabled = false;
            
        }
    }, 1000);
}
resend.addEventListener("click", function (event) {
  event.preventDefault();
    var oneMinutes = 60 * 0.1;
    otp.classList.remove ("hide");
    this.disabled = true;
    startTimer(oneMinutes, display);
})


</script>
<style type="text/css">
  .hide{
    display: none;
  }
</style>