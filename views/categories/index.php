<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 19/12/15
 * Time: 11:05
 */

/**
 * @var \yii\data\DataProviderInterface $categoriesProvider
 */
use yii\grid\GridView;
use yii\helpers\Html;

?>
<?= Html::csrfMetaTags() ?>

<h1>Categories</h1>

<?= GridView::widget([
    'dataProvider' => $categoriesProvider,
    'columns' => [
        'name',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]) ?>
