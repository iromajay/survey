<?php

namespace frontend\controllers;

use Yii;
use app\models\TravelInfo;
use app\models\TravelInfoSearch;
use app\models\Passenger;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf;
use yii\db\Transaction;
use yii\web\UploadedFile;
/**
 * TravelInfoController implements the CRUD actions for TravelInfo model.
 */
class DashboardController extends Controller
{
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
        if(Yii::$app->user->isGuest)
            $this->redirect(['site/login']);
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
        $this->layout = "homepage";
        $passenger = Passenger::findOne($passenger_id);
        // $passenger->dob = date("d-m-Y",$passenger->dob);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'passenger'=> $passenger
        ]);
    }
    public function actionViewdetail($id)
    {
        $p =Passenger::find()->where(['travel_info'=>$id])->one();
        // echo $p->id;die;
        $passenger = Passenger::find()->where(['travel_info'=>$id])->one();
        // echo $passenger->dob;die;
        $passenger->dob = date("d-m-Y",strtotime($passenger->dob));
        return $this->render('admin-view', [
            'model' => $this->findModel($id),
            'passenger'=> $passenger
        ]);
    }

     public function actionGeneratePdf($id)
    {
        $pdf_content =  $this->renderPartial('pdfview', [
            'model' => $this->findModel($id),
            'passenger'=> Passenger::find()->where(['travel_info'=>$id])->one()
        ]);
        $mpdf = new Mpdf();
        $filePath = Yii::getAlias('@app/web/css/pdf.css');
        $stylesheet = file_get_contents( $filePath);
        $mpdf->writeHTML($stylesheet,1);
        $mpdf->writeHTML($pdf_content,2);
        $mpdf->Output();
        exit;
    }
    public function actionReadfile($id,$name) {
          $model = $this->findModel($id);

            // This will need to be the path relative to the root of your app.
            $filePath =  Yii::getAlias('@app/'.$name);
            // echo $filePath;
            // die;
            // Might need to change '@app' for another alias
            // $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->fileName);
            $fileName = str_replace("uploads/","",$model->staff_list_file);
            return Yii::$app->response->sendFile($filePath, $fileName,['inline'=>true]);
    }

    /**
     * Creates a new TravelInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout='homepage';
        $model = new TravelInfo();
        $passenger = new Passenger();
        $manipur = 1;
        if ($model->load(Yii::$app->request->post()) && $passenger->load(Yii::$app->request->post()) ) {
            $model->status = 2;
            $bytes=3;  
            $model->token = bin2hex(openssl_random_pseudo_bytes($bytes));
            $passenger->dob = date('Y-m-d',strtotime($passenger->dob));
            echo $passenger->dob;
            $model->staff_list_filePath = UploadedFile::getInstance($model, 'staff_list_filePath');
            if($model->staff_list_filePath){
                $model->staff_list_filePath->saveAs('@app/uploads/' . $model->staff_list_filePath->baseName . '.' . $model->staff_list_filePath->extension);
                $model->staff_list_file = 'uploads/' . $model->staff_list_filePath->baseName . '.' . $model->staff_list_filePath->extension;
                 print_r($model->staff_list_file );     
            }
               


            $model->registration_filePath = UploadedFile::getInstance($model, 'registration_filePath');
            if($model->registration_filePath){
                $model->registration_filePath->saveAs('@app/uploads/' . $model->registration_filePath->baseName . '.' . $model->registration_filePath->extension);
                $model->registration_image_file = 'uploads/' . $model->registration_filePath->baseName . '.' . $model->registration_filePath->extension;
                 // print_r($model->staff_list_file );    
            }

            $model->medical_certificatePath = UploadedFile::getInstance($model, 'medical_certificatePath');
            if($model->medical_certificatePath){
                $model->medical_certificatePath->saveAs('@app/uploads/' . $model->medical_certificatePath->baseName . '.' . $model->medical_certificatePath->extension);
                $model->medical_certificate = 'uploads/' . $model->medical_certificatePath->baseName . '.' . $model->medical_certificatePath->extension;
                 // print_r($model->staff_list_file );    
            }

           // die;
            $transaction = Yii::$app->db->beginTransaction();
            if(!$model->save()){
                print_r($model->errors);
                $transaction->rollBack();
                die;

            }
            $passenger->travel_info = $model->id;
            if(!$passenger->save()){
                print_r($passenger->errors);
                $transaction->rollBack();
                die;
            }
            else {
                $transaction->commit();
            }
           // return $this->redirect(['view', 'id' => $model->id]);

            $passenger = Passenger::find()->where(['travel_info'=>$model->id])->one();
            return $this->redirect(['view', 'id' => $model->id,'passenger_id'=>$passenger->id]);    

        }//

        return $this->render('create', [
            'model' => $model,
            'passenger' => $passenger
        ]);
    }


    public function actionApprove($id) {
        $model = $this->findModel($id);
        $model->status = 1;
        $bytes=3;  
        $randomText = bin2hex(openssl_random_pseudo_bytes($bytes));
        $model->epass_id =  "EPASS".$randomText;
        if(!$model->save()) {
            Yii::$app->session->setFlash("error","Some error has occured, status  could not be changed. ");
            return $this->redirect(Yii::$app->request->referrer);
        }
        else{
            Yii::$app->session->setFlash("success","Status set to Approved");
            return $this->redirect(Yii::$app->request->referrer);
        }

    }
     public function actionInprogress($id) {
        $model = $this->findModel($id);
        $model->status = 2;
        $model->epass_id = "";
        if(!$model->save()) {
            Yii::$app->session->setFlash("error","Some error has occured, status  could not be changed. ");
            return $this->redirect(Yii::$app->request->referrer);
        }
        else{
            Yii::$app->session->setFlash("success","Status set to In progress");
            return $this->redirect(Yii::$app->request->referrer);
        }

    }
     public function actionDecline($id) {
        $model = $this->findModel($id);
        $model->status = 3;
        $model->epass_id = "";
        if(!$model->save()) {
            Yii::$app->session->setFlash("error","Some error has occured, status  could not be changed. ");
            return $this->redirect(Yii::$app->request->referrer);
        }
        else{
            Yii::$app->session->setFlash("success","Status changed to Decline");
            return $this->redirect(Yii::$app->request->referrer);
        }

    }
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
