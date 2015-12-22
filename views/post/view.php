<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $comment app\models\PostComment */
/* @var $commentsDataProvider yii\data\ActiveDataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'author',
            'body:ntext',
        ],
    ]) ?>
    <h3>Comments</h3>
    <?= GridView::widget([
        'dataProvider' => $commentsDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'author_name',
            'post_id',
            'body:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
//                'urlCreator' => function ($action, $model, $key, $index) {
//                        return 'index.php?r=post-comment/'.$action.'&id='.$key;
//                },
                'controller' => 'post-comment'
            ],
        ]
    ]); ?>

    <h4>Leave your comment:</h4>

    <?= $this->render('../post-comment/_form', [
        'model' => $comment,
        'actionPostComment' => 'post-comment/create'
    ]) ?>

</div>
