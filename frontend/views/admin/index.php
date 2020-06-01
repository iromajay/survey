<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TravelInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Travel Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Travel Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'epass',
            'travel_type',
            'reason',
            'start_date',
            'end_date',
            //'source_locality',
            //'source_district',
            //'source_state',
            //'source_police_station',
            //'dest_locality',
            //'dest_district',
            //'dest_state',
            //'dest_police_station',
            //'vehicle_type',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
