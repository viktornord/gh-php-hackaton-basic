<?php
/**
 * @var \app\models\Category $model
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?= Html::csrfMetaTags() ?>
<h1>Create a new category</h1>

<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => false,
    'method' => 'post'
]); ?>
<?= $form->field($model, 'name') ?>
<?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'create-cat-button']) ?>
<?php ActiveForm::end(); ?>