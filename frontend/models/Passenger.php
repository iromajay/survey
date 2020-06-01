<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "passenger".
 *
 * @property int $id
 * @property string $name
 * @property string $gender
 * @property string $dob
 * @property int $mobile_no
 * @property int $aadhar_no
 */
class Passenger extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passenger';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'gender', 'dob', 'mobile_no', 'aadhar_no'], 'required'],
            [['gender'], 'string'],
            [['dob'], 'safe'],
            [['mobile_no'], 'integer','message'=>'Please enter valid mobie number'],
            [['aadhar_no'],'string','max'=>12],
            [['name'], 'string', 'max' => 255],
            [['travel_info'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Full Name',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'mobile_no' => 'Mobile No',
            'aadhar_no' => 'Aadhar No',
        ];
    }
}
