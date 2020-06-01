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
class TrackStatus extends \yii\base\Model
{
    public $mobile_no;
    public $token;
    public function rules()
    {
        return [
            [['name', 'gender', 'dob', 'mobile_no', 'aadhar_no','token'], 'required'],
            [['epass_id'], 'string'],
            [['dob'], 'safe'],
            [['mobile_no'], 'integer','message'=>'Please enter valid mobie number'],
            [['aadhar_no'],'integer','message'=>'Please enter valid aadhar number'],
            [['name','token'], 'string', 'max' => 255],
            [['epass_id'],'safe']
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
