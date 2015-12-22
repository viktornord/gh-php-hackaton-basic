<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostComment */
/* @var $form yii\widgets\ActiveForm */
/* @var $actionPostComment String */
?>

<div class="post-comment-form">
    <?php $form = ActiveForm::begin([
        'action' => isset($actionPostComment) ? [$actionPostComment] : '',
    ]); ?>

    <?= $form->field($model, 'author_name')->textInput(['maxlength' => true]) ?>

    <?= Html::activeHiddenInput($model, 'post_id') ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
