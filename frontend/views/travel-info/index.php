<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\Reason;
use app\models\Status;
use app\models\Passenger;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TravelInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registrations';
?>
?>
<div class="raw">
    <div class="col-md-12" style="text-align: center;background-color: #cadfe3;padding: 20px;border-radius: 5px;">
        <h4><b>List of Applicants for E-Pass</b></h4>
    </div>
</div>
<?= Html::a('Setting', ['/admin/settings'], ['class'=>'btn btn-primary align']) ?>
<br><br><br><br>
<div class="travel-info-index">

    

    
    <div class="panel panel-default">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'epass_id',
                // 'traveltype.name',
                // [

                //     'filter' => false,
                //    'attribute'=> 'passenger_name',
                //    'value' => function($model) {
                //         return Passenger::find()->where(['travel_info'=>$this->id])->select('name');
                //         // return $reason->name;
                //    }
                // ],
                'name.name',
                'aadhar.aadhar_no',
                [
                    'filter' => false,
                   'attribute'=> 'reason',
                   'value' => function($model) {
                        
                        $reason = Reason::find()->where(['id'=>$model->reason])->one();
                        if($reason)
                            return $reason->name;
                        else
                            return "";
                   }
                ],
               // [ 
               //   'attribute'=>'start_date',
               //   'filter' =>false,
               //  ],
               //  [ 
               //   'attribute'=>'end_date',
               //   'filter' =>false,
               //  ],
                //'source_locality',
                //'source_district',
                //'source_state',
                //'source_police_station',
                //'dest_locality',
                //'dest_district',
                //'dest_state',
                //'dest_police_station',
                //'vehicle_type',
                [
                   'filter' => false,
                   'attribute'=> 'status',
                   'value' => function($model) {
                        $status = Status::find()->where(['id'=>$model->status])->one();
                        return $status->name;
                   }
                ],
                // ['class' => 'yii\grid\ActionColumn'],
                // [
                //     'class' => 'yii\grid\ActionColumn',
                //     'template' => '{view}{update}{delete}',
                //     'buttons' => ['view' => function($url, $model) {
                //         return Html::a('<span class="btnSpace btn btn-sm btn-success"><b class="fa fa-search-plus">Approve</b></span>', ['approve', 'id' => $model['id']], ['title' => 'Approve', 'data' => ['confirm' => 'Corfirmation, set status to "Approve"?', 'method' => 'post', ]]);
                //     },
                    // 'update' => function($id, $model) {
                    //     return Html::a('<span class="btnSpace btn btn-sm btn-primary"><b class="fa fa-pencil">In progress</b></span>', ['inprogress', 'id' => $model['id']], ['title' => 'In progress', 'data' => ['confirm' => 'Corfirmation, set status to "in progress"?', 'method' => 'post', ]]);
                    // },
                //     'delete' => function($url, $model) {
                //         return Html::a('<span class="btnSpace btn btn-sm btn-danger"><b class="fa fa-trash">Decline</b></span>', ['decline', 'id' => $model['id']], ['title' => 'Decline', 'class' => '', 'data' => ['confirm' => 'Are you sure you want to decline?', 'method' => 'post', ]]);
                //     }
                //     ]
                // ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
                    'buttons' => ['view' => function($url, $model) {
                        return Html::a('<span class="btnSpace btn btn-sm btn-success"><b class="fa fa-search-plus">View</b></span>', ['viewdetail', 'id' => $model['id']], ['title' => 'View Details', 'data' => ['traget'=>'_blank','method' => 'post', ]]);
                    },
                    
                    ]
                ],
            ],
        ]); ?>
    </div>

</div>
<style type="text/css">
    .btnSpace {
        margin-right: 20px;
    }
    .align{
        position: absolute;
        top: 28%;
        left:84%;
    }
</style>