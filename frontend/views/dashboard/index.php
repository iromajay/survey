<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\Reason;
use app\models\Status;
use app\models\Passenger;
use miloschuman\highcharts\Highcharts;
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

            <!-- chart !-->
<?php $arr = [
    ['mca',1],
    ['bca',7],
    ['mba',14],
]; 
// echo "<pre>";print_r($arr);echo "</pre>";die;
?>
<div class="col-md-6">
   <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo "Current Course Wise Total Student"; ?></h3>
            <div class="box-tools <?= (Yii::$app->language == 'ar') ? 'pull-left' : 'pull-right'; ?>">
                <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php
                 echo Highcharts::widget([
                        'scripts' => [
                            'highcharts-3d',   
                        ],
                        'options' => [  
                            'exporting'=>[
                                'enabled'=>false 
                            ],
                            'legend'=>[
                                'align'=>'center',
                                'verticalAlign'=>'bottom',
                                'layout'=>'vertical',
                                'x'=>0,
                                'y'=>0,
                            ],
                            'credits'=>[
                                    'enabled'=>false
                             ],
                            'chart'=> [
                                'type'=>'pie',
                                'options3d'=>[
                                    'enabled'=>true,
                                    'alpha'=>60
                                ]
                            ],

                            'title' => ['text' => 'Total Student'],
                            'plotOptions'=>[
                                'pie'=>[
                                    'innerSize'=>100,
                                    'depth'=>45,
                                    'dataLabels'=>[
                                        'enabled'=>false
                                         ],
                                    'showInLegend'=>true,
                                ],  
                            
                            ],
                            'series' => [[                            // mind the [[ instead of [
                               'type'=>'pie',
                               'name'=> 'Total Student',
                               'data'=> $arr,
                            ]],          
                            
                        ],
                    ]);
                ?>
        </div>
   </div>
</div>
<div class="col-md-6">
   <div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-bar-chart"></i> <?php echo  'Year Wise Admission'; ?></h3>
        
    </div>
    <div class="box-body">
<?php
    $arr = [
        [
            'name'=>"2020",
            'data'=>[11,22,31,14,25,26,7,8,9,10,11,12]
        ],
        [
            'name'=>"2019",
            'data'=>[21,12,31,44,55,66,77,68,99,11,11,13]
        ]
        
    ];
    // echo '<pre>';print_r($arr);echo "<pre>";
    echo Highcharts::widget([
        'options' => [  
            'chart'=>[
                'type'=>'column', 
            
            ],
            'exporting'=>[
                'enabled'=>false, 
            ],
            'credits'=>[
                    'enabled'=>false,
            ],
            'title'=>[
                'text'=>'Monthly Average Admission'
            ],
            'subtitle'=>[
                'text'=>'',
                'margin'=>0,
            ],
            'xAxis'=>[
                'categories'=> ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            ],
            'yAxis'=>[
                'title'=>[
                    'text'=>'Admission Count',
                ]
            ],
            'plotOptions'=>[
                 'column'=>[
                    'pointPadding'=>0.2,
                    'borderWidth'=>0
                 ],
            ],
            'series'=>$arr,
            ],
        ]);
?>
    </div>
   </div>
</div>
<!---End Year Wise Admission Block--->
</div>
            <!--chart end !-->


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