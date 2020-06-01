<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $id
 * @property string $name
 * @property int $state
 *
 * @property State $state0
 * @property Locality[] $localities
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'state'], 'required'],
            [['state'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['state'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'District',
            'state' => 'State',
        ];
    }

    /**
     * Gets query for [[State0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getState0()
    {
        return $this->hasOne(State::className(), ['id' => 'state']);
    }

    /**
     * Gets query for [[Localities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalities()
    {
        return $this->hasMany(Locality::className(), ['district' => 'id']);
    }
}
