<?php

namespace app\controllers;

use Yii;
use app\models\Phonebook;
use app\models\PhonebookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Phone;
/**
 * PhonebookController implements the CRUD actions for Phonebook model.
 */
class SiteController extends Controller
{
     public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            
        ];
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Phonebook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhonebookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Phonebook model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $this->findModel($id)->getPhones(),
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Phonebook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Phonebook();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_phonbook]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Phonebook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_phonbook]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Phonebook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Phonebook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Phonebook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Phonebook::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*
     * change the phone number in the table phone
     */
    
    public function actionUpdatenumber($id) {
        
        $model = Phone::findOne($id);
        $name = Phonebook::findOne($model->id_phonbook)->name;// имя для хлебных крошек
        
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_phonbook]);
        } else {
            return $this->render('updatephone',[
                'model' => $model,
                'name' => $name,
            ]);
        }
        
    }
    /*
     * delete the phone number in the table phone
     */
    public function actionDeletenumber($id)
    {
        $model = Phone::findOne($id);
        $model->delete();

        return $this->redirect(['view', 'id' => $model->id_phonbook]);
    }
    /*
     * add the phone number in the table phone
     */
     public function actionAddnumber($id)// для вывода крошек надо было б пириписать этот класс но так как уже час ночи отсылаю таким ))
    {
        $model = new Phone();
        $count= $model->find()->where(['id_phonbook' => $id])->count();
        
        if ($count < 10){
        
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_phonbook]);
        } else {
            return $this->render('creatnumber', [
                'model' => $model,
                'idphonebook' => $id,
                
            ]);
        }
        }  else {
            throw new \yii\web\NotFoundHttpException("Максимальное количество номеров 10"); // тут конечно надо было зделать красивее и вывисти в site/Error...
        }
       
    }
}
