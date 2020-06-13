
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TravelInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reset Users Password';
?>
<div class="raw">
    <div class="col-md-12" style="text-align: center;background-color: #cadfe3;padding: 20px;border-radius: 5px;">
        <h4><b>List of Applicants for Users</b></h4>
    </div>
</div>
<div class="travel-info-index">
    <div class="panel panel-default">
	    <?= GridView::widget([
	    	'id' => "grid",
	        'dataProvider' => $dataProvider,
	        'filterModel' => $searchModel,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],

	            'username',
	            [
			        'class' => 'yii\grid\CheckboxColumn',
			        // you may configure additional properties here
			    ],
	        ],
	    ]); ?>
	</div>
	<div class="col-md-4">
		<button class="btn btn-success" id="btnReset" >Reset Password</button>
	</div>
</div>
<?php 
$url = Url::to(['resetpassword']);
$this->registerJS("
	$(document).on('click','#btnReset',function(){
		var keys = $('#grid').yiiGridView('getSelectedRows');
		console.log(keys[0]);
		// $.post('$url',keys,function(data){
		// 	if(data==1)
		// 		alert('Reset succesful');
		// 	});
		console.log(keys.toString());
		
	})
	"
);
?>