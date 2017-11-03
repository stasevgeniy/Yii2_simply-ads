<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Ads;
use app\models\ContactForm;
use app\models\AddForm;
use app\models\SearchForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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

    /**
     * Displays homepage.
     * With Pagination
     * @return view index
     */
    public function actionIndex()
    {
        $model = new SearchForm();
        $query = Ads::find()->orderBy("id DESC");
        $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 9, 'pageSizeParam' => false, 'forcePageParam' => false]);
        $ads = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index',[
            'model' => $model,
            'ads' => $ads,
            'pages' => $pages,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return view contact
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return view about
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays add page.
     * Add new ad in database
     * @return view add
     */
    public function actionAdd()
    {
        $model = new AddForm();
        $ad = new Ads;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $ad -> phone =  $model -> phone;
            $ad -> title =  $model -> title;
            $ad -> text =  $model -> text;
            $ad -> insert();

            return $this->render('add', ['model' => $model, 'ok' => true]);
        } else {
            return $this->render('add', ['model' => $model]);
        }
    }

    /**
     * Displays search page.
     * Search ads by title and phone
     * With Pagination
     * @return view add
     */
    public function actionSearch()
    {
        $model = new SearchForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $text=$model->str;
            $query = Ads::find()->where(['or',['like', 'title', $text],['like', 'phone', $text]])->orderBy("id DESC");
            $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 9, 'pageSizeParam' => false, 'forcePageParam' => false]);
            $ads = $query->offset($pages->offset)->limit($pages->limit)->all();

            return $this->render('search',[
                'model' => $model,
                'ads' => $ads,
                'pages' => $pages,
            ]);
        }else {

            $query = Ads::find()->orderBy("id DESC");
            $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 9, 'pageSizeParam' => false, 'forcePageParam' => false]);
            $ads = $query->offset($pages->offset)->limit($pages->limit)->all();

            return $this->render('search',[
                'model' => $model,
                'ads' => $ads,
                'pages' => $pages,
            ]);
        }
    }

}
