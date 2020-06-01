<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Reason;
use app\models\Status;

$this->title ="Approval";
// $this->params['breadcrumbs'][] = ['label' => 'Travel Infos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
?>
<div class="raw">
    <div class="col-md-12" style="text-align: center;background-color: #cadfe3;padding: 20px;border-radius: 5px;">
        <h4><b>Details</b></h4>
         <?= Html::a('<span class="btn btn-sm btn-success"><b class="fa fa-search-plus">Approve</b></span>', ['approve', 'id' => $model['id']], ['title' => 'Approve', 'data' => ['confirm' => 'Corfirmation, set status to "Approve"?', 'method' => 'post', ]])?> 
          <?= Html::a('<span class="btnSpace btn btn-sm btn-primary"><b class="fa fa-pencil">In progress</b></span>', ['inprogress', 'id' => $model['id']], ['title' => 'In progress', 'data' => ['confirm' => 'Corfirmation, set status to "in progress"?', 'method' => 'post', ]]);?>
          <?= Html::a('<span class="btnSpace btn btn-sm btn-danger"><b class="fa fa-trash">Decline</b></span>', ['decline', 'id' => $model['id']], ['title' => 'Decline', 'class' => '', 'data' => ['confirm' => 'Are you sure you want to decline?', 'method' => 'post', ]]);?>
    </div>
</div>

<div class="travel-info-view ">

    <br><br>
          <!-- <?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->

          
      
    <br><br>
    <div class="panel panel default">

     <?= DetailView::widget([
        'model' => $passenger,
        'attributes' => [
            'name', 
            [
               'label' => "Aadhar",
               'value' =>function($passenger) {
                    return $passenger->aadhar_no;
               }
            ],
            [
                'label' => "Date of birth",
               'value' =>function($passenger) {
                    return $passenger->dob;
               }
            ],
           'mobile_no'
        ],

    ]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'token',
            [
                'label'=>'e-pass id',
                'value' => function($model) {
                    if($model->epass_id)
                        return $model->epass_id;
                    else
                        return "";
                }
            ],
            'passtype.pass_type',
            [
                'label' => 'Reason',
                'value' => function($model) {

                   $reason = Reason::find()->where(['id'=>$model->reason])->one();
                   if($reason)
                        return $reason->name;
                    else
                        return "";
                }
             ],
            
            [
                'label' => 'Status',
                'value' => function($model) {
                   $status = Status::find()->where(['id'=>$model->status])->one();
                    return $status->name;
                }
             ],
        ],

    ]) ?>
  <div class="row" style="margin-left: -5px;">
    <?php if($model->staff_list_file) { ?>
        <div class="col-md-3">
            <?php echo "<b>Staff List:</b>";
            ?>
                <?= Html::a(str_replace("uploads/","",$model->staff_list_file), [
                    'travel-info/readfile',
                    'id' => $model->id,
                    'name' => $model->staff_list_file
                ], [
                    // 'class' => 'btn btn-primary',
                    'target' => '_blank',
                ]); ?>
         </div>       
    <?php } ?>
        
        
    <?php if($model->registration_image_file) { ?>
           <div class='col-md-3'>
            <?php
            echo "<b>Registration Proof:</b>";
            ?>
                <?= Html::a(str_replace("uploads/","",$model->registration_image_file), [
                    'travel-info/readfile',
                    'id' => $model->id,
                    'name' => $model->registration_image_file
                ], [
                    // 'class' => 'btn btn-primary',
                    'target' => '_blank',
                ]); ?>
          </div>      
    <?php } ?>
       
        <div class="col-md-3">
            <?php if($model->medical_certificate) { 
             echo "<b>Medical Certificate:</b>";
            ?>
                <?= Html::a(str_replace("uploads/","",$model->medical_certificate), [
                    'travel-info/readfile',
                    'id' => $model->id,
                    'name' => $model->medical_certificate
                ], [
                    // 'class' => 'btn btn-primary',
                    'target' => '_blank',
                ]); ?>

        <?php } ?>
        </div> 
    </div>

</div>
</div>
<style type="text/css">
    .btnSpace {
        margin-left:20px;
    }
</style>