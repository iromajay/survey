<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\State;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\District */
/* @var $form yii\widgets\ActiveForm */
$states = ArrayHelper::map(State::find()->all(),'id','name');
?>

<div class="district-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->dropDownList(
        $states,
        ['prompt'=>'Select...']
        ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
