<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
// use app\models\TravelType;
// use app\models\Locality;
// use app\models\State;
// use app\models\District;
// use app\models\PoliceStation;

use app\models\Reason;
use app\models\PassType;
use kartik\date\DatePicker;

$reasons= ArrayHelper::map(Reason::find()->all(),'id','name');
$passTypes= ArrayHelper::map(PassType::find()->all(),'id','pass_type');
// $travelType = ArrayHelper::map(TravelType::find()->all(),'id','name');
// $localities= ArrayHelper::map(Locality::find()->all(),'id','name');
// $districts= ArrayHelper::map(District::find()->all(),'id','name');
// $states= ArrayHelper::map(State::find()->all(),'id','name');
// $policeStation= ArrayHelper::map(PoliceStation::find()->all(),'id','name');
// $vehicle_types= ArrayHelper::map(VehicleType::find()->all(),'id','name');
?>
<div class="col-lg-12" style="text-align: center;">
    <a href="<?= Url::to(['track-status/status']) ?>" class="btn btn-primary btn-lg butn" ><b class="glyphicon glyphicon-log-in "> Check-Status</b></a>
</div>
<div class="col-lg-12" style="text-align: center;"><h3 style="color: #b2acfa"><b>Apply for Digital-Pass</b></h3></div>
<br><br><br><br><br><br><br><br><br>
<div class="row">
    

<div class="panel panel-default col-lg-12" style="padding: 30px;">

    <?php $form = ActiveForm::begin(); ?>


   
     <?= $form->field($model, 'pass_type')->dropDownList(
        $passTypes,
        ['prompt'=>'Select Pass type']
        ); ?>       


    
    <?= $form->field($model, 'reason')->dropDownList(
        $reasons,
        ['prompt'=>'Select Reason']
        ); ?>        

    <?= $form->field($passenger, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($passenger, 'mobile_no')->textInput(['maxlength' => true]) ?>
    <?= $form->field($passenger, 'aadhar_no')->textInput(['maxlength' => true]) ?>
    <?= $form->field($passenger, 'dob')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]); ?>
     <?= $form->field($passenger, 'gender')->dropDownList(
            [1=>"Male",2=>"Female",3=>'Other'],
            ['prompt'=>'Select Gender']
            ); ?>   



    <div id="company" class="hide">
         <?= $form->field($model, 'staff_list_filePath')->fileInput() ?>    
    </div>
    <div id="shopping" class="hide">
        <?= $form->field($model, 'registration_filePath')->fileInput() ?>
    </div>
    <div id="medical" class="hide">
        <?= $form->field($model, 'medical_certificatePath')->fileInput() ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs("
    const Manipur = 1;
    $(document).on('change','#travelinfo-pass_type',function(){
       if(this.value==2)
            $('#company').removeClass('hide');
        else
            $('#company').addClass('hide');
       
        })
    $(document).on('change','#travelinfo-reason',function(){
       if(this.value==4)
            $('#shopping').removeClass('hide');
        else
            $('#shopping').addClass('hide');
       
        })
      $(document).on('change','#travelinfo-reason',function(){
       if(this.value==5)
            $('#medical').removeClass('hide');
        else
            $('#medical').addClass('hide');
       
        }) 
        
    ");
?>
<style type="text/css">
    .hide {
        display: none;
    }
</style>
