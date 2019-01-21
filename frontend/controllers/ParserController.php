<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Parser;
use frontend\models\Proxy;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use phpQuery;

/**
 * ParserController implements the CRUD actions for Parser model.
 */
class ParserController extends Controller
{

    public function actionIndex() {
        $model = new Parser;
        $urlList = [];

        if ($model->load(Yii::$app->request->post())) 
        {
            $uri = "https://www.google.com.ua/search?num=100&q=" . $model->keyword;
            
            if(isset($_REQUEST['checkProxy']))
            {
            $proxy = Proxy::getActiveProxy();
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $uri);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            //curl_setopt($ch, CURLOPT_HEADER, 1);
            $document = curl_exec($ch);
            curl_close($ch);
            }
            else 
            $document = file_get_contents($uri);

            $document = \phpQuery::newDocumentHTML($document);
            $news = $document->find("h3.r a");

            $urlList = $model->savePosition($news);
            $model->saveDate();
            $model->save();

            if ($model->position != 0)
                Yii::$app->session->setFlash('success', "Домен «$model->domain" 
                        . "» по ключевому слову «$model->keyword" . "» находится на «$model->position" 
                        . "» позиции выдачи Google");
            else
                Yii::$app->session->setFlash('success', "Домен «$model->domain" 
                        . "» не попадает в топ100 выборки Google, по ключевому слову «$model->keyword" . "»");
        }


        $dataProvider = new ActiveDataProvider([
            'query' => Parser::find()->orderBy('id DESC'),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider, 'model' => $model, 'urlList' => $urlList,
        ]);
    }

    public function actionHistory()
    {
        $model = new Parser;
        
        $dataProvider = new ActiveDataProvider([
            'query' => Parser::find()->orderBy('id DESC'),
        ]);

        return $this->render('history', [
                    'dataProvider' => $dataProvider, 'model' => $model,
        ]);
    }
    
    public function actionProxy()
    {
        $model= Proxy::findOne(['active' => '1']);
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Прокси успешно обновлён!");
        }
        
        return $this->render('proxy', ['model'=>$model,]);
    }

}
