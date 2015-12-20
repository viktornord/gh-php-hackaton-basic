<?php

use app\models\PostSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel PostSearch */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'author',
            [
                'attribute' => 'category_names',
                'label' => 'Categories',
                'value' => function ($model) {
                    return implode(', ', ArrayHelper::getColumn($model->categories, 'name'));
                }
            ],
            'body:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ]
    ]); ?>

</div>
