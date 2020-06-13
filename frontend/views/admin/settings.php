<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'SETTINGS';

?>
<div style="text-align: right;">
        <?= Html::a('Back ❯', ['travel-info/create'], ['class' => 'btn  btnk']) ?>
    </div>
<br><br>
<div class="panel panel-default" style="padding: 15px 1px 15px 25px ;">
    <div class="row" >

    	<div class="col-lg-4 col-md-4 col-sm-4" style="text-align: center;">
            <div class="panel panel-body panel-info" style="box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);width: 80%;background:linear-gradient(60deg, #353535, #FFFFFF);border-radius: 4px;padding-top: 5px;padding-bottom: 5px;">
                <p style="text-align: center;color:#fff;"><a href="<?=Url::to(['current-user-password-reset']) ?>" style="color: #481da6;"><h4><b><u>RESET PASSWORD</u></b></h4></a>
                </p>
              
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4" style="text-align: center;">
            <div class="panel panel-body panel-info" style="box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);width: 80%;background:linear-gradient(60deg, #353535, #FFFFFF);border-radius: 4px;padding-top: 5px;padding-bottom: 5px;">
                <p style="text-align: center;color:#fff;"><a href="<?=Url::to(['user/index']) ?>" style="color: #481da6;"><h4><b><u>MANAGE USERS</u></b></h4></a>
                </p>
              
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4" style="text-align: center;">
            <div class="panel panel-body panel-info" style="box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);width: 80%;background:linear-gradient(60deg, #353535, #FFFFFF);border-radius: 4px;padding-top: 5px;padding-bottom: 5px;">
                <p style="text-align: center;color:#fff;"><a href="<?=Url::to(['user/create']) ?>" style="color: #481da6;"><h4><b><u>CREATE USER</u></b></h4></a>
                </p>
              
            </div>
        </div>
       
    </div>
</div>
<style type="text/css">
    .modal-content {
    border-radius: 10px;
}
.size{
    height:50px;
}
.btnk{
        background-color: #c23921;
        color: white;
    }
</style>
<?php
Modal::begin([

            'header' => '<h4 style="text-align:center;"><b><b></h4>',

            'id' => 'popupmodal',

            'size' => 'modal-sm',
            'clientOptions' => ['backdrop' => 'static'],


        ]);
Modal::end();

Modal::begin([

            'header' => '<h4 style="text-align:center;"><b>SLIDER IMAGES<b></h4>',

            'id' => 'mymodal',

            'size' => 'modal-md',
            'clientOptions' => ['backdrop' => 'static'],


        ]);


       

        Modal::end();
         ?>
       


<?php $this->registerJs("$(function() {
   $('.popup').click(function(e) {
     e.preventDefault();
     $('#mymodal').modal('show').find('.modal-body')
     .load($(this).attr('href'));
   });

});");
?>