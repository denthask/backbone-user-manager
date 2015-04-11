<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "usr_auth_data".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 */
class UsrAuth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usr_auth_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 128],
            [['email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 512],
            [['email'], 'unique'],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
