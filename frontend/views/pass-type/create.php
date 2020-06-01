<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PassType */

$this->title = 'Create Pass Type';
$this->params['breadcrumbs'][] = ['label' => 'Pass Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pass-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
