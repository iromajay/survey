<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Reason;
use app\models\Status;

$this->title = $model->epass_id;
// $this->params['breadcrumbs'][] = ['label' => 'Travel Infos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
?>
<div class="raw">
    <div class="col-md-12" style="text-align: center;background-color: #cadfe3;padding: 20px;border-radius: 5px;">
        <h4><b>Application Details</b>
           <br><br>
            <div>
             <?= Html::a('Generate pdf', ['travel-info/generate-pdf', 'id' => $model->id], ['class' => 'btn btn-primary','target'=>'_blank']) ?>
            </div>
    </div>
</div>
<div class="travel-info-view">

    <br><br>
    <div>
         <!-- <?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
       
      
    </div>
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
               
            ],

        ]) ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'token',
                [
                    'label' => 'Reason',
                    'value' => function($model) {
                       $reason = Reason::find()->where(['id'=>$model->reason])->one();
                        return $reason->name;
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

        <div class="row">
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
            echo "<b>Registrattion Proof:</b>";
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
