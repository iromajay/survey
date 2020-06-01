<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pass_type".
 *
 * @property int $id
 * @property string $pass_type
 */
class PassType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pass_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pass_type'], 'required'],
            [['pass_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pass_type' => 'Pass Type',
        ];
    }
}
