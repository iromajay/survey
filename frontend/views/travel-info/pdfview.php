<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Reason;
use app\models\Status;

$this->title = "E-pass Application";
// $this->params['breadcrumbs'][] = ['label' => 'Travel Infos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
 $reason = Reason::find()->where(['id'=>$model->reason])->one();
 $status = Status::find()->where(['id'=>$model->status])->one();
?>
<!-- <div class="travel-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="first">
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
</div>
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

    ]) ?> -->
<div class="raw">
    <div class="col-md-12" style="text-align: center;background-color: #cadfe3;padding: 20px;border-radius: 5px;">
        <h3><b>Application Details</b>
           <br><br>
           
    </div>
</div>
<table>
    <tr>
        <td>Name</td><td><?= $passenger->name ?></td>
    </tr>
    <tr>
        <td>Mobile Number</td><td><?= $passenger->mobile_no ?></td>
    </tr>
    <tr>
        <td>Aadhar</td><td><?= $passenger->aadhar_no ?></td>
    </tr>
    <tr>
        <td>Date of Birth</td><td><?= date("d-m-Y",strtotime($passenger->dob)) ?></td>
    </tr>
    <tr>
        <td>Token</td><td><?= $model->token ?></td>
    </tr>
    <tr>
        <td>E-pass</td><td><?= ($model->epass_id)?$model->epass_id:"___" ?></td>
    </tr>
     <tr>
        <td>Reason</td><td><?= $reason->name ?></td>
    </tr>
     <tr>
        <td>Status</td><td><?= $status->name ?></td>
    </tr>
</div>
    
</table>
