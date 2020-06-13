<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;

\yii\web\YiiAsset::register($this);
?>
<div class="raw">
    <div class="col-md-6 col-md-offset-2" style="text-align: center;background-color: #cadfe3;padding: 20px;border-radius: 5px;">
        <h4><b>User Details</b>
           <br><br>
    </div>
</div>
<div class="user-view">
    <div class="panel panel default col-md-6 col-md-offset-2">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'username',
                'email:email',
            ],
        ]) ?>
    </div>
</div>
