<?php

namespace frontend\controllers;

use Yii;
use app\models\TravelInfo;
use app\models\TrackStatus;
use app\models\Passenger;
use app\models\TravelInfoSearch;
use app\models\UserSearch;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf;
/**
 * TravelInfoController implements the CRUD actions for TravelInfo model.
 */
class AdminController extends Controller
{
    
     public function actionStatus()
    {
        $this->layout = 'homepage';
        $trackStauts = new TrackStatus();
        if ($trackStauts->load(Yii::$app->request->post() ) ) {            
            $travel_info_exist = TravelInfo::find()->where(['epass_id'=>$trackStauts->epass_id])->exists();
            $passenger_exist = Passenger::find()->where(['mobile_no'=>$trackStauts->mobile_no])->exists();
            if($travel_info_exist && $passenger_exist) {
                $model = TravelInfo::find()->where(['epass_id'=>$trackStauts->epass_id])->one();
                $passenger = Passenger::find()->where(['travel_info'=>$model->id])->one();
                return $this->redirect(['view', 'id' => $model->id,'passenger_id'=>$passenger->id]);    
            }
            else {
                Yii::$app->SetFlash("error","Could not find the staus");
               return $this->redirect(['status']);
            }
            
        }

        return $this->render('status-form', [
            'trackStauts' => $trackStauts,
        ]);
    }

    public function actionSettings() {
        return $this->render('settings');
    }

    public function actionUsersResetPassword(){
       $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('user-reset-password', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } 

    public function actionCurrentUserPasswordReset(){
        $model = new \app\models\User();
        if($model->load(Yii::$app->request->post())) {
            $currentUser = User::findOne(Yii::$app->user->id);
            $isOldpasswordMatch = $currentUser->validatePassword($model->oldPassword);
            if($isOldpasswordMatch){
                $currentUser->setPassword($model->newPassword);
                $currentUser->save();
                Yii::$app->session->setFlash("success","Password saved successfully");
            }
            else {
                Yii::$app->session->setFlash("error","Old password is in correct");   
            }
            return $this->render('current-user-password-reset',['model'=>$model]);
        }
        return $this->render('current-user-password-reset',['model'=>$model]);
    }

    public function actionOtp() {
        $model =  new \app\models\User();
        return $this->render('otp',['model'=>$model]);
    }


    //Ajax method of reset password with checklist
    public function actionResetpassword(){
        $ids = Yii::$app->request->post('keys');
        $user_ids= explode(",", $ids);
        foreach ($user_ids as $key => $value) {
            $user = User::findOne($value);
            $user->setPassword("123456");
            $user->save();
        }
        return  'Password has been set successfully';
        
    }

    /**
     * {@inheritdoc}
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
     * Lists all TravelInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        // die("admin");
        $searchModel = new TravelInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TravelInfo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id,$passenger_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'passenger' => Passenger::findOne($passenger_id)
        ]);
    }
     public function actionGeneratePdf($id)
    {
        $pdf_content =  $this->renderPartial('pdfview', [
            'model' => $this->findModel($id),
        ]);
        $mpdf = new Mpdf();
        $mpdf->writeHTML($pdf_content);
        $mpdf->Output();
        exit;
    }

    /**
     * Creates a new TravelInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

   
    /**
     * Updates an existing TravelInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TravelInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TravelInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TravelInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TravelInfo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
