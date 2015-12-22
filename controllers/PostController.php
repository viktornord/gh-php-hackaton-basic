<?php

namespace app\controllers;

use app\models\Category;
use app\models\CategoryPost;
use app\models\PostComment;
use app\models\PostSearch;
use Yii;
use app\models\Post;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        if (empty(Yii::$app->request->getQueryParam('PostSearch'))) {
            $dataProvider = new ActiveDataProvider([
                'query' => Post::find(),
            ]);
        } else {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);;
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $comment = new PostComment();
        $comment->post_id = $id;

        return $this->render('view', [
            'model' => $this->findModel($id),
            'comment' => $comment,
            'commentsDataProvider' => new ActiveDataProvider([
                'query' => PostComment::find()->where(['post_id' => $id]),
            ])
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            /** @var Category[] $categories */
            $categories = Category::find()->where(['id'=>$model->categories_id])->all();
            foreach($categories as $category){
                $model->link('categories', $category);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('create', [
                'model' => $model,
                'category_names' => ArrayHelper::map(Category::find()->all(), 'id', 'name')
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->categories_id = ArrayHelper::getColumn($model->categories, 'id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /** @var Category[] $categories */
            $model->unlinkAll('categories', true);
            $categories = Category::find()
                ->where(['id'=>$model->categories_id])->all();
            foreach($categories as $category){
                $model->link('categories', $category);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'category_names' => ArrayHelper::map(Category::find()->all(), 'id', 'name')
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        $model->unlinkAll('categories', true);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
