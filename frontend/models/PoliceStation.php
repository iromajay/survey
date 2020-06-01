<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "police_station".
 *
 * @property int $id
 * @property string $name
 */
class PoliceStation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'police_station';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nearest Police Station',
        ];
    }
}
