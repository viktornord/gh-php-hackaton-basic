<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
/* @var $category_names */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= $form->field($model, 'categories_id')->widget(Select2::classname(), [
        'data' => $category_names,
        'language' => 'de',
        'options' => [
            'placeholder' => 'Select a state ...',
            'multiple' => 'true'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Category') ?>

    <?php ActiveForm::end(); ?>

</div>
