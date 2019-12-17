<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Movies;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    //Shows all the movies
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $obj = (object) [
            'items' => Movies::find()->all()
        ];
        return $obj;
    }
    
    public function actionAddmovie($title, $year)
    {
        $m = Movies::find()
            ->where(['title'=>$title])
            ->andWhere(['release_year' => $year])
            ->one();
        if(isset($m)) {
            return "Film already saved.";
        }
        $m = new Movies();
        $m->title = $title;
        $m->release_year = $year;
        $m->save();
        return "Saved";
    }
    
    public function actionRemovemovie($title)
    {
        $m = Movies::find()
            ->where(['title'=>$title])
            ->one();
        if(!isset($m)) {
            return "Film doesn't exists";
        }
        $m->delete();
        return "Removed";
    }
}
