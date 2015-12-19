<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 19/12/15
 * Time: 11:00
 */

namespace app\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;

class CategoriesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                    ],
                ]
            ]
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }
}