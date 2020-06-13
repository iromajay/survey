<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\userSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
?>
<div class="raw">
    <div class="col-md-12" style="text-align: center;background-color: #cadfe3;padding: 20px;border-radius: 5px;">
        <h4><b>List of Applicants for E-Pass</b></h4>
    </div>
</div>
<br><br><br><br>
<div class="user-index">
    <div class="panel panel-default">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'username',
                'email:email',
                //'status',
                //'created_at',
                //'updated_at',
                //'verification_token',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{update}',
                    'buttons' => [
                        'view' => function($url, $model) {
                            return Html::a('<span class="btnSpace btn btn-sm btn-success"><b class="fa fa-search-plus">View</b></span>', ['user/view', 'id' => $model['id']], ['title' => 'View Details', 'data' => ['traget'=>'_blank','method' => 'post', ]]);
                        },
                         'update' => function($id, $model) {
                        return Html::a('<span class="btnSpace btn btn-sm btn-primary"><b class="fa fa-pencil">Reset Password</b></span>', ['user/resetpassword', 'id' => $model['id']], ['title' => 'Reset Password', 'data' => ['confirm' => 'Corfirmation,are you sure you want to reset password?', 'method' => 'post', ]]);
                    },
                    
                    ]
                ],
            ],
        ]); ?>
    </div>
</div>
<style type="text/css">
    .btnSpace{
        margin-right: 20px;
    }
</style>
