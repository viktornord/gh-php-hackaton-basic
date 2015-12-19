<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 19/12/15
 * Time: 11:00
 */

namespace app\controllers;


use app\models\Category;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CategoriesController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index', [
            'categoriesProvider' => new ActiveDataProvider([
                'query' => Category::find()
            ])
        ]);
    }

    public function actionNew()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect('index.php?r=categories/index');
        }

        return $this->render('new', [
            'model' => $model
        ]);
    }

    public function actionView($id) {

        return $this->render('view', [
            'category' => Category::findOne($id)
        ]);
    }

    public function actionDelete($id) {
        Category::findOne($id)->delete();

        return $this->redirect('index.php?r=categories/index');
    }

    public function actionUpdate($id)
    {
        $model = Category::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->id = $id;
            $model->update();
            return $this->redirect('index.php?r=categories/index');
        } else {
            $model = Category::findOne($id);
        }

        return $this->render('edit', [
            'model' => $model
        ]);
    }
}