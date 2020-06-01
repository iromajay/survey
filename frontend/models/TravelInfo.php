<?php

namespace app\models;

use Yii;
use app\models\TavelType;

use app\models\Reason;
use app\models\Locality;
use app\models\District;
use app\models\State;
use app\models\PoliceStation;
use app\models\VehicleType;
use app\models\Status;
use app\models\PassType;
/**
 * This is the model class for table "travel_info".
 *
 * @property int $id
 * @property int $travel_type
 * @property int $reason
 * @property string $start_date
 * @property string $end_date
 * @property int $source_locality
 * @property int $source_district
 * @property int $source_state
 * @property string $source_police_station
 * @property int $dest_locality
 * @property int $dest_district
 * @property int $dest_state
 * @property resource $dest_police_station
 * @property int $vehicle_type
 * @property int $status
 */
class TravelInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $passenger_name;
    public $passenger_aadhar;
    public $registration_filePath;
    public $staff_list_filePath;
    public $medical_certificatePath;
    public static function tableName()
    {
        return 'travel_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pass_type', 'reason',  'status'], 'required'],
            [[ 'status'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['registration_filePath','staff_list_filePath','medical_certificatePath' ], 'file'],
            [['source_state','epass_id','token','passenger_name','passenger_aadhar','registration_image_file','staff_list_file', 'registration_filePath','staff_list_filePath','staff_list_file ','registration_image_file ','  medical_certificate'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'epass_id'=>'e-Pass',
            'travel_type' => 'Travel Type',
            'reason' => 'Reason',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'source_locality' => 'From Locality',
            'source_district' => 'From District',
            'source_state' => 'From State',
            'source_police_station' => 'From Police Station',
            'dest_locality' => 'To Locality',
            'dest_district' => 'To District',
            'dest_state' => 'To State',
            'dest_police_station' => 'To Police Station',
            'vehicle_type' => 'Vehicle Type',
            'status' => 'Status',
            'passenger_name' => 'Name',
            'passenger_aadhar' => 'Aadhar',
            'registration_filePath' => 'Upload registration proof',
            'staff_list_filePath' => 'Upload Staff list'
        ];
    }
    public function getTraveltype() {
        return TravelType::find()->where(['id'=>$this->travel_type])->select('name');
    }
     public function getReason() {
        return Reason::find()->where(['id'=>$this->reason])->select('name');
    }
     public function getLocality() {
        return Locality::find()->where(['id'=>$this->source_locality])->select('name');
    }
    public function getSourcedistrict() {
        return District::find()->where(['id'=>$this->source_district])->select('name');
    }
    public function getSourcestate() {
        return State::find()->where(['id'=>$this->source_state])->select('name');
    }
    public function getSourcepolicestation() {
        return PoliceStation::find()->where(['id'=>$this->source_police_station])->select('name');
    }
     public function getDestdistrict() {
        return District::find()->where(['id'=>$this->dest_district])->select('name');
    }
    public function getDeststate() {
        return State::find()->where(['id'=>$this->dest_state])->select('name');
    }
    public function getVehicle() {
        return VehicleType::find()->where(['id'=>$this->vehicle_type])->select('name');
    }
    public function getStatus() {
        return Status::find()->where(['id'=>$this->status])->select('name');
    }
    public function getName() {
        return Passenger::find()->where(['travel_info'=>$this->id])->select('name');
    }
    public function getAadhar() {
        return Passenger::find()->where(['travel_info'=>$this->id])->select('aadhar_no');
    }
    public function getPasstype() {
        return PassType::find()->where(['id'=>$this->pass_type])->select('pass_type');
    }
}
